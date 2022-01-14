const ajaxLoadMore = () => {
  const button = document.querySelector(".load-more-btn");

  if (typeof button != "undefined" && button != null) {
    button.addEventListener("click", (e) => {
      e.preventDefault();

      let current_page = document.querySelector(".blog-masonry").dataset.page;
      let max_pages = document.querySelector(".blog-masonry").dataset.max;

      let params = new URLSearchParams();
      params.append("action", "load_more_posts");
      params.append("current_page", current_page);
      params.append("max_pages", max_pages);

      axios.post("/wp-admin/admin-ajax.php", params).then((res) => {
        let posts_list = document.querySelector(".blog-masonry");

        posts_list.innerHTML += res.data.data;

        let getUrl = window.location;
        let baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

        window.history.pushState(
          "",
          "",
          baseUrl +
            "page/" +
            (parseInt(document.querySelector(".blog-masonry").dataset.page) + 1)
        );

        console.log(
          parseInt(document.querySelector(".blog-masonry").dataset.page)
        );

        document.querySelector(".blog-masonry").dataset.page++;

        if (
          document.querySelector(".blog-masonry").dataset.page ==
          document.querySelector(".blog-masonry").dataset.max
        ) {
          button.parentNode.removeChild(button);
        }
      });
    });
  }
};

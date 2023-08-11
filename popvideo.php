<div id="videoModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 32px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/NgKG6YZs4H0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    let videoModal = $('#videoModal');
    let videoIframe = videoModal.find('iframe');

    setTimeout(function() {
      let cookieValue = getCookie("videoPopupShown");
      if (cookieValue !== "true") {
        videoModal.modal('show');
        setCookie("videoPopupShown", "true", 365);
      }
    }, 5000);

    videoModal.on('hidden.bs.modal', function () {
      setCookie("videoPopupShown", "true", 365);
      let src = videoIframe.attr('src');
      videoIframe.attr('src', src);
    });

    function getCookie(name) {
      let value = "; " + document.cookie;
      let parts = value.split("; " + name + "=");
      if (parts.length === 2) return parts.pop().split(";").shift();
    }

    function setCookie(name, value, days) {
      let expires = new Date();
      expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
      document.cookie = name + "=" + value + ";expires=" + expires.toUTCString() + ";path=/";
    }
  });
</script>
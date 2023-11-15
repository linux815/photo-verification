window.onload = function() {
    $(document).ready(function() {
        let attemptsLeft = 5;

        $('#photo').on('error', function() {
            attemptsLeft--;
            if (attemptsLeft > 0) {
                checkPhotoDecision();
            }
        });
        function checkPhotoDecision() {
            let photoId = Math.floor(Math.random() * 10000) + 1;
            $.ajax({
                url: "/api/photos/checkPhotoDecision?photo_id=" + photoId
            }).then(function (data) {
                let imageUrl = 'https://picsum.photos/id/' + photoId + '/500/500';
                $("#photo").attr("src", imageUrl).attr("data-photo-id", photoId)
            }).catch(function (data) {
                checkPhotoDecision();
            });
        }

        function approvePhoto() {
            $.ajax({
                url: "/api/photos/verify",
                method: "post",
                data: {photo_id: $("#photo").attr("data-photo-id"), decision: "approved"}
            }).then(function(data) {
                checkPhotoDecision();
            }).catch(function(data) {
                alert("Unable to update photo, try again later");
            });
        }
        function declinePhoto() {
            $.ajax({
                url: "/api/photos/verify",
                method: "post",
                data: {photo_id: $("#photo").attr("data-photo-id"), decision: "declined"}
            }).then(function(data) {
                checkPhotoDecision();
            }).catch(function(data) {
                alert("Unable to update photo, try again later");
            });
        }

        $("#approveButton").click(function(){
            approvePhoto();
        });

        $("#declineButton").click(function(){
            if (confirm('Are you sure you want to decline the photo?')) {
                declinePhoto();
            }
        });

        checkPhotoDecision();
    });
};
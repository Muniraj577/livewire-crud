function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $("#imgPreview").attr('src', e.target.result).width(100).height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function () {
    readURL(this);
});
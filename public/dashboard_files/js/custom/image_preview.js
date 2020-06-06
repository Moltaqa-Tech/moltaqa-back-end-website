// image preview
$(".image").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});

// image preview
$(".images").change(function () {

    if (this.files) {
        $('#galary').empty();
        for(let i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {

                $('<img />',
                            { id: 'image' + i,
                            src: e.target.result,
                            width: 100,
                            class: 'img-thumbnail image-preview',
                            })
                            .appendTo($('#galary'));
            }

            reader.readAsDataURL(this.files[i]);
        }
    }
});


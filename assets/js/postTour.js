const image_input = document.querySelector("#image-input");
const image = document.querySelector("#image");
const hidden = document.querySelector("#hidden");
image_input.addEventListener("change", function () {
    const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            image.src = uploaded_image;
            hidden.value = uploaded_image;
            image.style.border = "1px solid black";
        })
    reader.readAsDataURL(this.files[0]);
})


function Check() {
    let kt = true;
    const dateIn = document.querySelector("#dateIn");
    const dateOut = document.querySelector("#dateOut");
    if (dateIn.value>dateOut.value) {
        dateIn.style.border="1px solid red";
        dateOut.style.border="1px solid red";
        kt= false;
    }
    if (hidden.value=="") 
    {
        alert("Chưa chọn hình ảnh");
        image.style.border = "1px solid red";
        kt = false;
    }
    if (!kt) {
        scroll(0, 100);
    }
    return kt;

}
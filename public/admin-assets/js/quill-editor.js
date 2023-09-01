if(document.querySelector('.quill-editor')){
    var editors = document.querySelectorAll('.quill-editor');
var quills = [];

editors.forEach((editor) => {
    var quill = new Quill(editor, {
        theme: "snow",
        modules: {
            toolbar:
                [
                    [{ font: [] }, { size: [] }],
                    ["bold", "italic", "underline", "strike"],
                    [{ color: [] }, { background: [] }],
                    [{ script: "super" }, { script: "sub" }],
                    [{ header: [!1, 1, 2, 3, 4, 5, 6] }, "blockquote", "code-block"],
                    [{ list: "ordered" }, { list: "bullet" }, { indent: "-1" }, { indent: "+1" }],
                    ["direction", { align: [] }],
                    ["link", "image", "video"],
                    ["clean"]
                ]
        }
    })
    quills.push(quill);
})

let hiddenTextarea = document.querySelectorAll('textarea[hidden]');
let form = document.querySelector('form');
form.addEventListener('submit', (e) => {
    editors.forEach((editor, index) => {
        hiddenTextarea[index].value = quills[index].root.innerHTML;
    })
})


}
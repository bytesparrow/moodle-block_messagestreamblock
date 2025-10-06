export const init = () => {

    const editor = document.querySelector("#messagestream-popup .ql-editor");
    const inputselector = '#messagestream-popup div.action-checkboxes div.flex:has(.ai-checked) input';
    if (editor) {
        editor.addEventListener("focus", function () {
            setTimeout(function () {
                const element = document.querySelector(inputselector);
                if (element) {
                    element.setAttribute("disabled", "true");
                }
            }, 100); // 100 Millisekunden Verzögerung
        });
    } else
    {
        alert("noedit");
    }



};
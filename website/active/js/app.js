function jump(faild, automove) {
    if (faild.value.length >= faild.getAttribute("maxlenght")) {
        document.getElementById(automove).focus();
    }
}
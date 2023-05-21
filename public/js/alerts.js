let closeBtn = document.querySelectorAll('.closebtn');

closeBtn.forEach(item => {
    item.addEventListener('click', () => {
        let divParent = item.parentElement;

        divParent.style.opacity = "0";

        setTimeout(() => {
            divParent.style.display = "none";
        }, 600);
    });
});

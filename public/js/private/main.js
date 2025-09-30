function toggleSubmenu(menuId) {
    const submenu = document.getElementById(menuId + "-submenu");
    const arrow = document.getElementById(menuId + "-arrow");

    if (submenu && arrow) {
        submenu.classList.toggle("hidden");

        arrow.classList.toggle("rotate-180");
    }
}

function updateTime() {
    const now = new Date();
    const timeString = `${String(now.getDate()).padStart(2, "0")}/${String(
        now.getMonth() + 1
    ).padStart(2, "0")}/${now.getFullYear()} - ${String(
        now.getHours()
    ).padStart(2, "0")}.${String(now.getMinutes()).padStart(2, "0")}.${String(
        now.getSeconds()
    ).padStart(2, "0")}`;

    const dateElement = document.getElementById("currentDate");
    if (dateElement) {
        dateElement.textContent = timeString;
    }
}

setInterval(updateTime, 1000);
updateTime();

document.querySelectorAll(".menu-button").forEach((element) => {
    element.addEventListener("click", function (e) {
        const isAnchorTag = this.tagName === "A";

        if (isAnchorTag) {
            e.preventDefault();
        }

        const ripple = document.createElement("span");
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + "px";
        ripple.style.left = x + "px";
        ripple.style.top = y + "px";
        ripple.classList.add("ripple");

        this.querySelector(".ripple")?.remove();
        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();

            if (isAnchorTag) {
                window.location.href = this.href;
            }
        }, 600);
    });
});

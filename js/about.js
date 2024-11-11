const startDate = new Date("2024-09-01");
const currentDate = new Date();
const monthsDiff = (currentDate.getFullYear() - startDate.getFullYear()) * 12 + 
                    (currentDate.getMonth() - startDate.getMonth());

const experienceEl = document.getElementById("experience-months");
let current = 0;
const timer = setInterval(() => {
    if (current === monthsDiff) {
        clearInterval(timer);
    } else {
        current++;
        experienceEl.textContent = current;
    }
}, 100);

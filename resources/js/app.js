document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("trendingSlider");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    const scrollAmount = 260; // Ubah jika perlu

    nextBtn.addEventListener("click", () => {
        slider.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });

    prevBtn.addEventListener("click", () => {
        slider.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("projectModal");
    const closeModal = document.getElementById("closeModal");

    const learnMoreButtons = document.querySelectorAll(".learn-more");
    learnMoreButtons.forEach(button => {
        button.addEventListener("click", function() {
            const projectTitle = this.getAttribute("data-title");
            const projectImage = this.getAttribute("data-image");
            const projectDescription = this.getAttribute("data-description");
            const projectLink = this.getAttribute("data-link");

            document.getElementById("modalTitle").textContent = projectTitle;
            document.getElementById("modalImage").src = "images/" + projectImage;
            document.getElementById("modalDescription").textContent = projectDescription;
            document.getElementById("modalLink").href = projectLink;
            modal.style.display = "block";
            setTimeout(() => {
                modal.style.opacity = "1";
            }, 100);
        });
    });
    closeModal.addEventListener("click", function() {
        modal.style.display = "none";
    });
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

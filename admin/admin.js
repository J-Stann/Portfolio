document.addEventListener("DOMContentLoaded", function() {
    const projectForm = document.querySelector("#project-form");
    if (projectForm) {
        projectForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const title = document.getElementById("project-title").value;
            const description = document.getElementById("project-description").value;
            const image = document.getElementById("project-image").value;
            if (!title || !description || !image) {
                alert("Please fill out all fields.");
            } else {
                projectForm.submit();
            }
        });
    }
    const skillsForm = document.querySelector("#skills-form");
    if (skillsForm) {
        skillsForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const skillName = document.getElementById("skill-name").value;
            const skillLevel = document.getElementById("skill-level").value;
            if (!skillName || !skillLevel) {
                alert("Please fill out all fields.");
            } else {
                skillsForm.submit();
            }
        });
    }
});
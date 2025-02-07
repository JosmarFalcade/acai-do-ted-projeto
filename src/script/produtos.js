document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".acompanhamentos input[type='checkbox']");
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            let checkedCount = document.querySelectorAll(".acompanhamentos input[type='checkbox']:checked").length;
            if (checkedCount > 5) {
                this.checked = false;
                alert("Você só pode escolher até 5 acompanhamentos.");
            }
        });
    });
});
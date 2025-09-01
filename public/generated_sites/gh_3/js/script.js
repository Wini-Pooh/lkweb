/* Сайт: gh */
/* Создан: 31.08.2025 12:58 */

/* Блок: FAQ с рейтингом (faq) */

function rateAnswer(button, isPositive) {
    // Получаем текущее значение
    const currentText = button.textContent.trim();
    const currentCount = parseInt(currentText.match(/\d+/)[0]);
    
    // Увеличиваем счетчик
    const newCount = currentCount + 1;
    
    // Обновляем текст кнопки
    if (isPositive) {
        button.innerHTML = `<i class="fas fa-thumbs-up"></i> Да (${newCount})`;
        button.classList.remove("btn-outline-success");
        button.classList.add("btn-success");
    } else {
        button.innerHTML = `<i class="fas fa-thumbs-down"></i> Нет (${newCount})`;
        button.classList.remove("btn-outline-danger");
        button.classList.add("btn-danger");
    }
    
    // Отключаем кнопку
    button.disabled = true;
    
    // Показываем уведомление
    setTimeout(() => {
        const message = isPositive ? "Спасибо за положительную оценку!" : "Спасибо за обратную связь!";
        // Здесь можно добавить toast уведомление
    }, 200);
}

document.addEventListener("DOMContentLoaded", function() {
    // Добавляем плавную анимацию для аккордеона
    const collapseElements = document.querySelectorAll(".collapse");
    
    collapseElements.forEach(element => {
        element.addEventListener("show.bs.collapse", function() {
            this.style.transition = "height 0.3s ease";
        });
        
        element.addEventListener("hide.bs.collapse", function() {
            this.style.transition = "height 0.3s ease";
        });
    });
});


const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const loginForm = document.querySelector('.form-box.login form');
const registerForm = document.querySelector('.form-box.register form');

// 1) переключение между Login/Registration
registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
    clearForms();
});
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
    clearForms();
});

// 2) открыть попап и закрыть
btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});
iconClose.addEventListener('click', () => {
    // закрываем модалку и сбрасываем на форму логина
    wrapper.classList.remove('active-popup', 'active');
    clearForms();
});

// клик по фону за пределами формы — тоже закрывает и сбрасывает
wrapper.addEventListener('click', (e) => {
    if (e.target === wrapper) {
        wrapper.classList.remove('active-popup', 'active');
        clearForms();
    }
});

// 3) при перезагрузке страницы — очищаем всё
window.addEventListener('load', clearForms);

// функция очистки форм и удаления ошибок
function clearForms() {
    [loginForm, registerForm].forEach(form => {
        form.reset();
        form.querySelectorAll('.input-box.error').forEach(box => box.classList.remove('error'));
        form.querySelectorAll('.error-message').forEach(msg => msg.remove());
    });
}

// Валидация «required» перед отправкой
function validateForm (form) {
    let valid = true;
    form.querySelectorAll('input[required]').forEach(input => {
        const box = input.closest('.input-box');
        // удаляем старую ошибку
        box.classList.remove('error');
        box.querySelectorAll('.error-message').forEach(e => e.remove());

        if (!input.value.trim()) {
            valid = false;
            // добавляем класс на контейнер
            input.classList.add('error');
            // создаём подсказку
            const err = document.createElement('span');
            err.classList.add('error-message');
            err.innerText = 'required';
            box.appendChild(err)
        }
    });
    return valid;
}

// применяем валидацию при отправке каждой формы
loginForm.addEventListener('submit', e => {
    if (!validateForm(loginForm)) e.preventDefault();
});

registerForm.addEventListener('submit', e => {
    if (!validateForm(registerForm)) e.preventDefault();
});
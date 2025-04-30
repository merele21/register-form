const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const loginForm = document.querySelector('.form-box.login form');
const registerForm = document.querySelector('.form-box.register form');

// переключение на регистрацию
registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
    clearForms();
});

// переключение на логин
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
    clearForms();
});

// открытие попапа
btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});

// закрытие попапа
iconClose.addEventListener('click', () => {
    // закрываем модалку и сбрасываем на форму логина
    wrapper.classList.remove('active-popup');
    wrapper.classList.remove('active');
});

// клик по фону за пределами формы — тоже закрывает и сбрасывает
wrapper.addEventListener('click', (e) => {
    if (e.target === wrapper) {
        wrapper.classList.remove('active-popup');
        wrapper.classList.remove('active');
        clearForms();
    }
});

// при загрузке страницы очищаем поля
window.addEventListener('load', clearForms);

// функция очистки форм и удаления ошибок
function clearForms() {
    [loginForm, registerForm].forEach(form => {
        form.reset();
        form.querySelectorAll('.input-error').forEach(i => i.classList.remove('input-error'));
        form.querySelectorAll('.error-message').forEach(e => e.remove());
    });
}

// валидация «обязательных» полей
function validateForm (form) {
    let valid = true;
    form.querySelectorAll('input[required]').forEach(input => {
        const box = input.closest('.input-box');
        // удаляем старую ошибку
        box.querySelectorAll('.error-message').forEach(e => e.remove());
        input.classList.remove('input-error');

        if (!input.value.trim()) {
            valid = false;
            input.classList.add('input-error');
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
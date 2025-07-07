<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Проверка обязательных полей
    if (empty($name) || empty($email) || empty($message)) {
        die('Пожалуйста, заполните все обязательные поля.');
    }
    
    // Валидация email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Некорректный email адрес.');
    }
    
    // Настройки почты
    $to = 'ваша_почта@example.com'; // Замените на реальный email
    $email_subject = $subject ?: "Сообщение от $name";
    
    // Формирование тела письма
    $email_body = "Имя: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Сообщение:\n$message\n";
    
    // Заголовки
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Отправка письма
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'Сообщение успешно отправлено!';
    } else {
        echo 'Ошибка при отправке сообщения.';
    }
} else {
    http_response_code(403);
    echo 'Доступ запрещен';
}
?>
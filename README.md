<h1>Русская версия</h1>
Система бронирования билетов на мероприятия
Этот проект представляет собой систему бронирования билетов на мероприятия, разработанную с использованием PHP, MySQL, HTML, CSS и JavaScript. Система позволяет пользователям бронировать билеты на различные мероприятия и управляет процессом продажи билетов, включая генерацию уникальных штрих-кодов для каждого заказа.

Особенности
Удобный интерфейс: Интуитивно понятный веб-интерфейс для пользователей для навигации по мероприятиям и легкого оформления бронирования.
Управление базой данных: Использует MySQL для хранения информации о заказах, включая детали мероприятий, цены на билеты, количество и штрих-коды.
Интеграция API: Интегрируется с макетом API для симуляции процесса бронирования и подтверждения.
Обработка ошибок: Включает обработку ошибок для распространенных проблем, таких как дублирование штрих-кодов и сбои в бронировании.
Структура базы данных
База данных состоит из таблицы для управления заказами, которая включает поля, такие как:

id: Увеличивающийся номер заказа
event_id: Уникальный идентификатор мероприятий
event_date: Дата и время мероприятия
ticket_adult_price: Цена билетов для взрослых
ticket_adult_quantity: Количество заказанных билетов для взрослых
ticket_kid_price: Цена детских билетов
ticket_kid_quantity: Количество заказанных детских билетов
barcode: Уникальный штрих-код для заказа
equal_price: Общая цена заказа
created: Дата и время создания заказа

Установка
Клонируйте репозиторий.
Импортируйте предоставленный SQL файл для настройки базы данных.
Настройте параметры подключения к базе данных в файле config.php.
Запустите проект на локальном сервере (например, XAMPP).
Использование
Перейдите на главную страницу, чтобы просмотреть доступные мероприятия.
Щелкните по мероприятию, чтобы забронировать билеты.
Введите необходимые данные и завершите процесс бронирования.

<h1>English Version</h1>
Event Ticket Booking System
This project is an Event Ticket Booking System built using PHP, MySQL, HTML, CSS, and JavaScript. The system allows users to book tickets for various events and manages the ticket sales process, including the generation of unique barcodes for each order.

Features
User-Friendly Interface: An intuitive web interface for users to navigate through events and make bookings easily.
Database Management: Utilizes MySQL for storing order information, including event details, ticket prices, quantities, and barcodes.
API Integration: Integrates with a mock API to simulate the booking and confirmation process.
Error Handling: Includes error handling for common issues, such as duplicate barcodes and booking failures.
Database Structure
The database consists of a table to manage orders, which includes fields such as:

id: Incremental order number
event_id: Unique identifier for events
event_date: Date and time of the event
ticket_adult_price: Price of adult tickets
ticket_adult_quantity: Quantity of adult tickets ordered
ticket_kid_price: Price of child tickets
ticket_kid_quantity: Quantity of child tickets ordered
barcode: Unique barcode for the order
equal_price: Total price of the order
created: Date and time the order was created

Installation
Clone the repository.
Import the provided SQL file to set up the database.
Configure the database connection settings in the config.php file.
Run the project on a local server (e.g., XAMPP).
Usage
Navigate to the main page to view available events.
Click on an event to book tickets.
Enter the required details and complete the booking process.


<h1>النسخة العربية</h1>
نظام حجز تذاكر الفعاليات
هذا المشروع هو نظام حجز تذاكر الفعاليات تم بناؤه باستخدام PHP وMySQL وHTML وCSS وJavaScript. يسمح النظام للمستخدمين بحجز تذاكر لفعاليات مختلفة ويدير عملية بيع التذاكر، بما في ذلك إنشاء رموز باركود فريدة لكل طلب.

الميزات
واجهة مستخدم سهلة الاستخدام: واجهة ويب بديهية للمستخدمين للتنقل عبر الفعاليات وإجراء الحجوزات بسهولة.
إدارة قاعدة البيانات: يستخدم MySQL لتخزين معلومات الطلبات، بما في ذلك تفاصيل الفعاليات وأسعار التذاكر والكميات والباركودات.
تكامل API: يتكامل مع واجهة API وهمية لمحاكاة عملية الحجز والتأكيد.
معالجة الأخطاء: يتضمن معالجة الأخطاء للمشاكل الشائعة، مثل الرموز الباركود المكررة وفشل الحجز.
هيكل قاعدة البيانات
تتكون قاعدة البيانات من جدول لإدارة الطلبات، والذي يتضمن حقولًا مثل:

id: رقم الطلب التزايدي
event_id: معرف فريد للفعاليات
event_date: تاريخ ووقت الحدث
ticket_adult_price: سعر تذاكر البالغين
ticket_adult_quantity: كمية تذاكر البالغين المطلوبة
ticket_kid_price: سعر تذاكر الأطفال
ticket_kid_quantity: كمية تذاكر الأطفال المطلوبة
barcode: رمز باركود فريد للطلب
equal_price: السعر الإجمالي للطلب
created: تاريخ ووقت إنشاء الطلب

التثبيت

استنساخ المستودع.
استيراد ملف SQL المقدم لإعداد قاعدة البيانات.
تكوين إعدادات الاتصال بقاعدة البيانات في ملف config.php.
تشغيل المشروع على خادم محلي (مثل XAMPP).
الاستخدام
انتقل إلى الصفحة الرئيسية لعرض الفعاليات المتاحة.
انقر على حدث لحجز التذاكر.
أدخل التفاصيل المطلوبة وأكمل عملية الحجز.






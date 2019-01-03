# atlantykron-schedule

This app came as a solution for an educational camp whose schedule was typed manually over many, many years.

It's split on two sides: a front panel in which everyone will see the schedule, ordered by days and a back panel where all the needed data is first gathered and entered in the database and later on generated and grouped by days. The admin panel also has the option of exporting the schedule, by day, as a pdf document.

As for the used technologies:

a) Front: HTML 5, CSS 3, JavaScript, jQuery 2.1 (along with a few built-on plugins such as datatables, timepicker, select2, slimscroll and many others), Bootstrap.

b) Back: PHP 7, CodeIgniter 3.1.8, TCPDF 6.2. Regarding the code, a basic MVC design pattern has been used.

c) Database: relational (MySQL)

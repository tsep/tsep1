<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate: 2005-06-25 17:39:06 +0200 (Sa, 25 Jun 2005) $

@lastedited $LastChangedBy: olaf $

$LastChangedRevision: 198 $
*/
$tsep_lng['above_values'] = <<<_P
значения выше
_P;

$tsep_lng['add'] = <<<_P
добавить
_P;

$tsep_lng['all'] = <<<_P
все
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
назначенные профили индексирования
_P;

$tsep_lng['button_search'] = <<<_P
Поиск
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Перейдите по ссылке, чтобы открыть страницу
_P;

$tsep_lng['close_this_window'] = <<<_P
Закрывает это окно
_P;

$tsep_lng['config_absPath'] = <<<_P
Определите абсолютный путь к примерам TSEP: если файл search.php расположен в /home/www/php/tsepsearch/search.php он будет выглядеть как '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Проверять существование файла перед показом его в результатах ? Если ДА, то поиск немного замедлится, но в результатх будут только существующие файлы. Имейте в виду, что это работает, толко если в php.ini разрешена опция allow_url_open. Возможно, Вам НАДО отключить это.
_P;

$tsep_lng['config_Color_1'] = <<<_P
Первый из двух цветов (строк) для длинных списков
_P;

$tsep_lng['config_Color_2'] = <<<_P
Второй из двух цветов (строк) для длинных списков
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Как отображать дату (стиль PHP, Вы можете использовать D, l, Ì. è F). Вывод будет на языке, котороый Вы установили выше. Наприме: английский стиль: 'l, F d Y h:i', немецкий стиль: 'l, d. F Y, G:i', русский стиль - 'd-m-Y ,h:i A'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Введите исключаемые папки:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Это - путь к исключаемой папке относительно Вашего файла indexer.php. Например: ./папка1/папка3, если папка3 содержит исключаемые папки и/или файлы. Добавляйте элементы списка через запятую (',') без использования пробела (', ' - неправильно).
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
При поиске проверяется версия MySQL, потому что для поиска с условиями (булевого) необходима версия 4.0.0 или выше. Если Ваша версия MySQL меньше, то ВСЕ слова, которые пользователь вводит в поле поиска, должны присутствовать на странице. Только в этом случае она будет отображена в списке результатов. Хотите ли Вы предупредить пользователя о наличии только старой версии сервера баз данных и, следовательно, отсутствии булевого поиска ?  Мы рекомендуем установить эту опцию в 'true', иначе пользователь может удивиться отсутствию результатов поиска.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Включаемые расширения файлов:
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
Indexer индексирует файлы с заданными здесь расширениями (используйте список с элементами, разделяемыми запятой, например: HTM,HTML,PHP).
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Введите исключаемые файлы:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Это - путь к исключаемому файлу относительно Вашего файла indexer.php. Например: ./папка1/папка4/login.php, если файл login.php надо исключить. Добавляйте элементы через запятую без пробела (',' вместо ', ').
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Введите полное имя файла с раширением php - скрипта поставки внешних данных
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Это имя файла PHP-скрипта вне TSEP, который поставляет имена файлов ддля индексирования. Например: crawler/spider.php - смотри документацию для более подробной информации
_P;

$tsep_lng['config_group_general'] = <<<_P
Общее
_P;

$tsep_lng['config_group_lists'] = <<<_P
Списки
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Цвета списков
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Границы списков
_P;

$tsep_lng['config_group_logging'] = <<<_P
Журналирование
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Интерфейс пользователя
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Границы
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Результаты
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Помощь в поиске
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Поиск
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Разница в часах между временем сервера и местным. Поправьте соответственно.
_P;

$tsep_lng['config_max_exec_time'] = <<<_P
Максимальное разрешенное время работы индексатора(в минутах)
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Сколько подсказок для поиска должно быть отображено(0=выкл)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
Должна ли строка помощи в поиске показывать количество страниц возвращенных запросом?
_P;

$tsep_lng['config_show_popular'] = <<<_P
Должна ли строка помощи в поиске показывать популярность запроса?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Какой вид вычисления для количества страниц возвращать?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Во время логирования запроса для поиска: <br/> 1 = Использовать результаты последнего поиска<br/> 2 = Вычислять среднее из всех запросов<br/> 3 = Вычислять наименьшее из всех запросов<br/> 4 = Вычислять наибольшее из всех запросов
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Сколько символов показывать после первого соответствия ?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
Результат поиска будет частью полного индексированного текста. Это значение показывает, сколько символов будет показано ПОСЛЕ первого соответствия.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Сколько симолов показывать перед первым соотетствием ?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
Результат поиска будет частью полного индексированного текста. Это значение показывает, сколько символов будет показано ПЕРЕД первым соответствием.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Если пользователь не может установить число результатов на странице, то по умолчанию будет использовано это значение (сначала будет выведено это число результатов, потом - навигация по страницам).
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Сколько соответствий показывать ?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
Результат поиска - только часть индексированного текста. 
_P;

$tsep_lng['config_internal_notes'] = <<<_P
внутренние заметки
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Это поле может быть использовано для внутренних заметок. Они видимы в этом месте только администраторам.
_P;

$tsep_lng['config_Language'] = <<<_P
На каком языке Вы хотите работать с TSEP? Пример: если Вам нужен английский язык, укажите 'en', немецкий - 'de', русский - 'ru'.
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
показывать только список подлежащих индексированию фалйов.
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
Индексировщик не создаёт индекс, а только составляет список файлов, которые будут индексироваться.<br>Кроме того, будет выведен список файлов и папок, которые будут пропущены.
_P;

$tsep_lng['config_Logging'] = <<<_P
Хотите включить журналирование (true/false)
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
Записывать IP-адреса? (true/false)
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
Записывать переходы по результатам поиска? (true/false)
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
Записывать запросы поиска? (true/false)
_P;

$tsep_lng['config_max_hints'] = <<<_P
Количество отмеченых поисковых терминов для каждого предложении
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
Число определяет максимальное количество поисковых терминов которое может содержатся в предложении
_P;

$tsep_lng['config_max_length'] = <<<_P
Максимальная длина предложения (в символах)
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Предложения с количеством символов превышающей заданое не будут отображатся
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
Сколько элементов индекса в одном html-документе при полном показе индекса ? Осторожно, если Вы установите слишком большое число, страница может стать ОЧЕНЬ большой !
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
Сколько элементов индекса в одном html-документе при редактировании индекса ? Осторожно, если Вы установите слишком большое число, страница может стать ОЧЕНЬ большой !
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
Сколько элементов журнала Вы хотите видеть на одной странице?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
Сколько стоп-слов Вы хотите видеть на одной странице?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
Нумеровать результаты поиска? (true/false)
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Если мы нумеруем результаты поиска, то это отображается после цифр.
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Если мы нумеруем результаты поиска, то это отображается до цифр.
_P;

$tsep_lng['config_Pagerank'] = <<<_P
Ваш символ рейтинга страницы. Например: *. Вы также можете ввести что-нибудь из HTML, однако избегайте специальных символов. Например: <?img src="graphics/tsepranks-single.png" alt= "*"?>. Внимание: всё, что бы Вы ни ввели, будет отображено столько раз, сколько слов поиска найдено на странице !
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
Хотите отображать рейтинг поиска?
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Введите параметр для передачи скрипту-поставщику данных:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Этот параметр используется с внешним источником данных. Наприер: имя html-файла, с которого "паук" должен начинать свой поиск - смотри документацию для более подробных сведений.
_P;

$tsep_lng['config_Path'] = <<<_P
определяет путь к Вашему TSEP. Например: если файл search.php расположен в www.ваш_домен.com/php/tsepsearch/search.php, здесь следует указать 'php/tsepsearch'
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Показать список проиндексированных файлов
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
индексировщику следует запустить скрипт-поставщик данных
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
Индексировщик запустит скрипт-поставщик данных, чтобы получить имена файлов, которые следует проиндексировать.
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
Индексировщик должен найти файлы через просмотр папок
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Указывает индексировщику собирать имена файлов через сканирование папок, начиная с заданной выше (классический режим поиска TSEP)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
Может ли пользователь установить число результатов на одной странице?
_P;

$tsep_lng['config_word_offset'] = <<<_P
Количество слов, которые будут отображаться перед/после поисковых терминов
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
Результаты поиска будут только частью полностью проиндексированого текста. Эта записть определяет сколько слов будет показать перед и после каждого нажатия
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
только для программистов: использовать функцию debugprint() ? (должно быть выключено для нормального использования TSEP)
_P;

$tsep_lng['config_XdirName'] = <<<_P
Папка начала индексирования
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
Указание папки начала индексирования необходимо <strong>только в специальных случаях</strong>!<br> Вы можете ввести что-нибудь, подобное ../../ или www/htdocs/ваш_аккаунт
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Введите адрес:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Это веб-адрес, который соответствует заданной выше папке. Например: http://www.имясайта.com/папка1/папка2. Если все файлы на "http://имясайта.com" должны быть проиндексированы, то правильная установка - "http://www.имясайта.com".
_P;

$tsep_lng['configuration'] = <<<_P
Конфигурация
_P;

$tsep_lng['copyright'] = <<<_P
Копирайт
_P;

$tsep_lng['create_new_index'] = <<<_P
Создать новый индекс
_P;

$tsep_lng['data_retrieved'] = <<<_P
Данные получены из базы данных 
_P;

$tsep_lng['day_friday'] = <<<_P
Пятница
_P;

$tsep_lng['day_friday_short'] = <<<_P
Пт
_P;

$tsep_lng['day_monday'] = <<<_P
Понедельник
_P;

$tsep_lng['day_monday_short'] = <<<_P
Пн
_P;

$tsep_lng['day_saturday'] = <<<_P
Суббота
_P;

$tsep_lng['day_saturday_short'] = <<<_P
Сб
_P;

$tsep_lng['day_sunday'] = <<<_P
Воскресенье
_P;

$tsep_lng['day_sunday_short'] = <<<_P
Вс
_P;

$tsep_lng['day_thursday'] = <<<_P
Четверг
_P;

$tsep_lng['day_thursday_short'] = <<<_P
Чт
_P;

$tsep_lng['day_tuesday'] = <<<_P
Вторник
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
Вт
_P;

$tsep_lng['day_wednesday'] = <<<_P
Среда
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
Ср
_P;

$tsep_lng['delete'] = <<<_P
удалить
_P;

$tsep_lng['details'] = <<<_P
подробно
_P;

$tsep_lng['directory'] = <<<_P
папка
_P;

$tsep_lng['docorrectit'] = <<<_P
пожалуйста, ИСПРАВЬТЕ эту ошибку ПЕРЕД продолжением!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
ошибка (ошибки), возвращены внешним скриптом
_P;

$tsep_lng['filename'] = <<<_P
имя файла
_P;

$tsep_lng['filter'] = <<<_P
фильтр
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
Внимание: в Ваших словах поиска найдены следующие стоп-слова, поиск по которым запрещён администратором (более полную информацию Вы найдёте в "Советах по поиску"):
_P;

$tsep_lng['found_no_pages'] = <<<_P
Страницы не найдены.
_P;

$tsep_lng['group_level_gap'] = <<<_P
определение уровня группы: уровень группы должен быть в точности на 1 больше, чем уровень предшествующей группы
_P;

$tsep_lng['help'] = <<<_P
Справка
_P;

$tsep_lng['help_copyright'] = <<<_P
Открывает новое окно и загружает страницу TSEP на SourceForge.net
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
Вы уверены, что хотите удалить эту страницу из индекса (убирая всё о ней из базы данных)?
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
Вы уверены, что хотите удалить этот максимальный результат?
_P;

$tsep_lng['help_del_stopword'] = <<<_P
Хотите удалить это стоп-слово ?
_P;

$tsep_lng['help_first_page'] = <<<_P
перейти на первую страницу
_P;

$tsep_lng['help_last_page'] = <<<_P
перейти на последнюю страницу
_P;

$tsep_lng['help_next_page'] = <<<_P
перейти на следующую страницу
_P;

$tsep_lng['help_previous_page'] = <<<_P
перейти на предыдущую страницу
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Если у Вас всё ещё проблемы с поиском, или Вы не удовлетворены результатами, пожалуйста, пошлите нам e-mail со своими проблемами или пожеланиями.
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
невозможно: имя уже существует
_P;

$tsep_lng['index_edit_date'] = <<<_P
Дата последней правки индекса:
_P;

$tsep_lng['index_edit_head'] = <<<_P
Редактировать данные, сохранённые в индексе.
_P;

$tsep_lng['index_edit_title'] = <<<_P
Редактирование индекса (подробное)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Дата последнего редактирования:
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
Не редактировалось
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Дата последнего индексирования:
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
Не индексировалось
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Нажмите здесь, чтобы исправить подробные сведения о странице.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Нажмите здесь для отображения страницы в браузере.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Нажмите на заголовке страницы или ссылке, чтобы открыть подробное описание элемента.
_P;

$tsep_lng['index_overview_help'] = <<<_P
Совет: Используйте функцию поиска Вашего браузера, чтобы найти искомое ещё быстрее
_P;

$tsep_lng['index_overview_title'] = <<<_P
Обзор индекса (кратко)
_P;

$tsep_lng['indexed_words'] = <<<_P
Просмотреть текущий индекс полностью (может быть очень большим)
_P;

$tsep_lng['indexer_title'] = <<<_P
Индексировщик
_P;

$tsep_lng['indexing_in'] = <<<_P
Индексирование сделано за
_P;

$tsep_lng['indexing_on'] = <<<_P
Индексирование сделано
_P;

$tsep_lng['indexingprofile'] = <<<_P
Профиль индексирования
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
профиль индексирования не существует: имя_профиля
_P;

$tsep_lng['info_from_extscript'] = <<<_P
информация, возвращённая внешним скриптом
_P;

$tsep_lng['intErr'] = <<<_P
внутренняя ошибка
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
неверное определение типа поля
_P;

$tsep_lng['is'] = <<<_P
является
_P;

$tsep_lng['logview_contents'] = <<<_P
Элемент
_P;

$tsep_lng['logview_head'] = <<<_P
Все записи журнала приведены ниже
_P;

$tsep_lng['logview_ip'] = <<<_P
IP, создавший запись
_P;

$tsep_lng['logview_no_IP'] = <<<_P
не записан
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Время создания записи
_P;

$tsep_lng['logview_title'] = <<<_P
Слова поиска и открытия страниц
_P;

$tsep_lng['logview_type'] = <<<_P
Тип журнала
_P;

$tsep_lng['logview_type_1'] = <<<_P
Слова поиска
_P;

$tsep_lng['logview_type_2'] = <<<_P
Переходы по результатам
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
Опознаный IP
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Stopwords
_P;

$tsep_lng['mandatory'] = <<<_P
* Это обязательное поле ! Пожалуйста, введите значение.
_P;

$tsep_lng['match_case'] = <<<_P
учитывать регистр
_P;

$tsep_lng['matches'] = <<<_P
соответствий.
_P;

$tsep_lng['month_april'] = <<<_P
Апрель
_P;

$tsep_lng['month_april_short'] = <<<_P
Апр
_P;

$tsep_lng['month_august'] = <<<_P
Август
_P;

$tsep_lng['month_august_short'] = <<<_P
Авг
_P;

$tsep_lng['month_december'] = <<<_P
Декабрь
_P;

$tsep_lng['month_december_short'] = <<<_P
Дек
_P;

$tsep_lng['month_february'] = <<<_P
Февраль
_P;

$tsep_lng['month_february_short'] = <<<_P
Фев
_P;

$tsep_lng['month_january'] = <<<_P
Январь
_P;

$tsep_lng['month_january_short'] = <<<_P
Янв
_P;

$tsep_lng['month_july'] = <<<_P
Июль
_P;

$tsep_lng['month_july_short'] = <<<_P
Июл
_P;

$tsep_lng['month_june'] = <<<_P
Июнь
_P;

$tsep_lng['month_june_short'] = <<<_P
Июн
_P;

$tsep_lng['month_march'] = <<<_P
Март
_P;

$tsep_lng['month_march_short'] = <<<_P
Мар
_P;

$tsep_lng['month_may'] = <<<_P
Май
_P;

$tsep_lng['month_may_short'] = <<<_P
Май
_P;

$tsep_lng['month_november'] = <<<_P
Ноябрь
_P;

$tsep_lng['month_november_short'] = <<<_P
Ноя
_P;

$tsep_lng['month_october'] = <<<_P
Октябрь
_P;

$tsep_lng['month_october_short'] = <<<_P
Окт
_P;

$tsep_lng['month_september'] = <<<_P
Сентябрь
_P;

$tsep_lng['month_september_short'] = <<<_P
Сен
_P;

$tsep_lng['more_than_four'] = <<<_P
Пожалуйста, введите строку длля поиска из четырёх символов или более.
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
Внимание: из-за старой версии сервера баз данных поиск не испоьлдзовал булевы выражения. Все слова, введённые Вами, должны встретиться в документе для того, чтобы он был найден. Операторы поиска не будут использоваться.
_P;

$tsep_lng['name_already_exists'] = <<<_P
имя уже существует
_P;

$tsep_lng['name_is_empty'] = <<<_P
пустое имя 
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
вернуться на предыдущую страницу
_P;

$tsep_lng['new_index_head'] = <<<_P
Новый индекс был создан !<br />Ниже список проиндексированных файлов
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Создаётся новый индекс...<br />Пожалуйста, потерпите...
_P;

$tsep_lng['new_window'] = <<<_P
(новое окно)
_P;

$tsep_lng['no_records'] = <<<_P
Нет записей
_P;

$tsep_lng['none'] = <<<_P
нет
_P;

$tsep_lng['nothing'] = <<<_P
ничего
_P;

$tsep_lng['of'] = <<<_P
 
_P;

$tsep_lng['old_index_head'] = <<<_P
Ниже список (СТАРЫХ) индексированных файлов, в настоящее время находящихся в базе данных.
_P;

$tsep_lng['only'] = <<<_P
Только
_P;

$tsep_lng['only_one_value'] = <<<_P
только одно значение!
_P;

$tsep_lng['only_one_word'] = <<<_P
только одно слово!
_P;

$tsep_lng['page_file_size'] = <<<_P
Размер файла страницы:
_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Идексированные слова-метатеги:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Индексированные слова:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Слов:
_P;

$tsep_lng['page_number'] = <<<_P
Страница номер:
_P;

$tsep_lng['page_rank'] = <<<_P
x найдено
_P;

$tsep_lng['page_rank_help'] = <<<_P
Ваши слова поиска были встречались на странице с данной частотой
_P;

$tsep_lng['page_rank_real'] = <<<_P
Рейтинг этой страницы (вычислен по числу появлений слов поиска в документе)
_P;

$tsep_lng['page_title'] = <<<_P
Заголовок страницы:
_P;

$tsep_lng['page_url'] = <<<_P
Адрес страницы:
_P;

$tsep_lng['pages_found'] = <<<_P
страниц найдено.
_P;

$tsep_lng['pages_indexed'] = <<<_P
страниц проиндексировано
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
страниц НЕ будет проиндексировано
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
страниц будет проиндексировано
_P;

$tsep_lng['powered_by'] = <<<_P
работает на
_P;

$tsep_lng['protect_indexentry'] = <<<_P
защитить элемент индекса (от перестроения или удаления индексировщиком)
_P;

$tsep_lng['protected_indexentry'] = <<<_P
Элемент индекса защищён
_P;

$tsep_lng['really_delete'] = <<<_P
действительно удалить ?
_P;

$tsep_lng['records'] = <<<_P
Записей
_P;

$tsep_lng['rename'] = <<<_P
переименовать
_P;

$tsep_lng['results'] = <<<_P
Результаты
_P;

$tsep_lng['results_to_show_user'] = <<<_P
Пользователь может выбрать следующее число результатов поиска для отображения на одной странице:
_P;

$tsep_lng['save'] = <<<_P
сохранить
_P;

$tsep_lng['saveas'] = <<<_P
сохранить как
_P;

$tsep_lng['search_tips'] = <<<_P
Советы по поиску
_P;

$tsep_lng['search_tips_desc'] = <<<_P
Поисковый движок TSEP по умолчанию ищет все заданные слова и выводит страницуЮ на которой есть все заданные слова поиска. Минимальное число символов в слове для выполнения поиска равно 4. Ниже приведены примеры булева поиска, используемого в TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
найти страницы, которые содержат хотя бы одно из этих слов.
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
найти страницы, которые содержат оба этих слова.
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
слово "apple", но рейтинг выше, если также содержит "macintosh".
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
слово "apple", но не "macintosh".
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
"яблочный" и "пирог", или "яблочный" и "струдель", но рейтинг слов "яблочный пирог" выше, чем "яблочный струдель".
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
"яблоко", "яблок" и "яблоку". * заменяет 0 или более символов и может стоять только в конце слова поиска!
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
ищет страницы, которые содержат фразу "какие-то слова" (например, страницы, содержащие "какие-то слова странные", но не "какие-то непонятные слова").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Советы по эффективному использованию TSEP.
_P;

$tsep_lng['search_tips_help'] = <<<_P
открывает справку в новом окне
_P;

$tsep_lng['search_tips_se1'] = <<<_P
яблоко банан
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+яблоко +банан
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+apple macintosh
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+apple -macintosh
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+яблочный +(>пирог <струдель)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
яблок*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"какие-то слова"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Советы по поиску
_P;

$tsep_lng['search_took'] = <<<_P
Поиск занял
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Если слово поиска является стоп-словом, то по нему не будет выполнен поиск или выведены результаты. Кроме стоп-слов, определённых пользователем, могут быть слова, определённые администратором. Это:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Выполнен поиск по сайту 
_P;

$tsep_lng['seconds'] = <<<_P
секунд
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
разделяйте несколько значений при помощи запятой
_P;

$tsep_lng['show_it'] = <<<_P
показать
_P;

$tsep_lng['show_results_per_page'] = <<<_P
результатов на страницу будет показано. Каждое изменение перезагружает страницу с новым значением.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
/ страницу
_P;

$tsep_lng['sim_index_head'] = <<<_P
Файлы для индексирования. <br />Ниже список фалов, которые будут проиндексированы
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Идёт поиск фалов... <br />Пожалуйста, подождите...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
страницы не будут проиндексированы (из-за защищённых элементов индекса)
_P;

$tsep_lng['sort_asc'] = <<<_P
сортирует А -> Я, старейшее -> новейшее
_P;

$tsep_lng['sort_desc'] = <<<_P
сортирует Я -> А, новейшее -> старейшее
_P;

$tsep_lng['start_indexing'] = <<<_P
Начать индексирование**
_P;

$tsep_lng['stopwords'] = <<<_P
Стоп-слова
_P;

$tsep_lng['stopwords_title'] = <<<_P
Стоп-слова
_P;

$tsep_lng['to'] = <<<_P
до
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project (ППД, Проект "Поисковый Движок")
_P;

$tsep_lng['type'] = <<<_P
тип
_P;

$tsep_lng['update'] = <<<_P
обновить
_P;

$tsep_lng['value_already_exists'] = <<<_P
значение уже существует
_P;

$tsep_lng['value_for'] = <<<_P
значение для
_P;

$tsep_lng['version'] = <<<_P
Версия 
_P;

$tsep_lng['warning'] = <<<_P
** Пожалуйста, нажмите кнопку "Начать индексирование" только один раз, и не закрывайте окно Вашего браузера, пока поиск не закончится. Также не запускайте несколько экземпляров этого индексировщика.
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Стоп-слова<br/>(не отыскиваются и не помечаются в результатах)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Включить просмотр через HTTP
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
"Просмотр через HTTP" имеет (как минимум) два преимущества: SSI-содержимое также просматривается; кроме того, URLы вне локальной области также могут быть проиндексированы (напр., файлы, которые нельзя прочитать напрямую через local/fileopen). Недостаток - процесс индексирования может ОЧЕНЬ замедлиться!
_P;

$tsep_lng['error_while_parsing'] = <<<_P
Ошибка(Ошибки) при чтение или обработке
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
***CAUTION***: ALL depending indices are Deleted too, if they are not assigned to other indexingprofiles too!
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Пути
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Входящие и Выходящие
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
Дополнительная поддержка
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Режим индексирования
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Иднекс изменений
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Общее
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Фильтр
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Убрать фильтр
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Всё
_P;

$tsep_lng['filter_from'] = <<<_P
От:
_P;

$tsep_lng['filter_to'] = <<<_P
Для:
_P;

$tsep_lng['filter_date_format'] = <<<_P
ГГГ-[М]М-[Д]Д
_P;

$tsep_lng['filter_time_format'] = <<<_P
ЧЧ:ММ:СС
_P;

$tsep_lng['logviewstats_title'] = <<<_P
<@>Условия поиска и открытия страниц: Статистика
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Статистика
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Всего
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Детали
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Вверх
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Все записи
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
Не разрешен
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Записей в журнале
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Установок и обновлений
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Запросов
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Переходов по результатам
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Уникальных доменов
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Уникальных IP-адресов
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Уникальных слов
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Уникальных слов, исключённых из поиска
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Популярнейшие запросы 
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Переходы по результатам
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Уникальные слова поиска
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Уникальные слова
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Уникальные IP-адреса
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Уникальные домены
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
Индексирование уже запущено (или что-то идет не так)<br/>Пожалуйста подождите %d минут и попробуйте снова.
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>Предупреждение: Параметр PHP safe_mode ВКЛЮЧЕН</b><br />Максимальное время выполнения которое Вы установили в конфигурации не будет работать на этой системе.<br /> Параметр PHP установлен администратором на таймаут после %d минут.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Дополнительная информация:
_P;

$tsep_lng['ss_search_term'] = <<<_P
Запрос
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Ранее использовавшиеся запросы для поиска
_P;

$tsep_lng['ss_popular'] = <<<_P
Популярный
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Количество использований запроса (популярность)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
ВС
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
Количество страниц, которые возвратил запрос
_P;

?>

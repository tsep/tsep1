<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate$

@lastedited $LastChangedBy$

$LastChangedRevision$
*/
$tsep_lng['above_values'] = <<<_P
Valores anteriores
_P;

$tsep_lng['add'] = <<<_P
Añadir
_P;

$tsep_lng['all'] = <<<_P
Todos
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
Perfiles de los índices asignados
_P;

$tsep_lng['button_search'] = <<<_P
Buscar
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Pulse en este enlace para abrir la página
_P;

$tsep_lng['close_this_window'] = <<<_P
Cerrar esta ventana
_P;

$tsep_lng['config_absPath'] = <<<_P
defina la ruta absoluta al ejemplo de TSEP:  si el archivo search.php esta localizado en /home/www/php/tsepsearch/search.php este debiera ser '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
defina la ruta absoluta para el TSEP temp-directory
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
¿Comprobar si existe realmente antes de mostrar los resultados? Si elige 'true' (verdadero), la búsqueda es un poco más lenta, pero en los resultados sólo se mostrarán los archivos que existen todavía. Tenga en cuenta que esto sólo funciona cuando 'allow_url_open' está activado en 'php.ini'. Quizás DEBA establecer esto como 'false' (falso)
_P;

$tsep_lng['config_Color_1'] = <<<_P
Primer color alterno (de una fila) cuando son listas largas
_P;

$tsep_lng['config_Color_2'] = <<<_P
Segundo color alterno (de una fila) cuando son listas largas
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Cómo mostrar la fecha (estilo PHP: puede usar D, l, M & F). Se mostrará en el idioma arriba elegido. Ejemplos: estilo Inglés: 'I, F d Y h:i a' - estilo Alemán: 'I, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Introduzca los directorios que se excluirán:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Esta es la ruta de la carpeta que va a ser excluída del directorio raíz de su sitio. Por ejemplo: /folder1/folder3, si http://www.yourdomain.com/folder1/folder3 contiene los directorios y archivos que van a ser excluídos. Agregue multiples entradas añadiendo ',' pero no ', '(es decir, sin espacio) 
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
Al buscar se comprueba su versión MySQL porque se necesita la versión 4.0.1 o superior para búsquedas booleanas. Puede usar operadores booleanos, MySQL < 4.0.0: todas las palabras que el usuario introduce en el campo de búsqueda deben estar en una página. Sólo en este caso, la página se mostrará en la lista de resultados. ¿Desea notificar al usuario si solamente hay disponible una versión vieja de la base de datos y no hay búsqueda booleana? Recomendamos que deje esta opción en 'true' (verdadero) ya que en otro caso podría confundir al usuario cuando no obtenga ningún resultado.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Extensiones de los archivos que se incluirán
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
El indice sólo ordena archivos cuya extension se da aquí (use una lista separada por comas, e.g: HTM,HTML,PHP)
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Introduzca los archivos que se excluirán
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Esta es la ruta del archivo que va a ser excluido del directorio raíz de su sitio. Por ejemplo: '/folder1/folder4/login.php', si http://www.yoursite.com/folder1/folder4/login.php va a ser excluído. Agregue multiples entradas añadiendo ',' pero no ', '(es decir, sin espacio) 
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Introduzca el nombre completo del archivo .php de un proveedor de datos externo
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Este es el nombre de un archivo .php-script fuera de TSEP, el cual suministra los archivos a indexar. Por ejemplo: crawler/spider.php (para detalles, vea la documentación)
_P;

$tsep_lng['config_group_general'] = <<<_P
General
_P;

$tsep_lng['config_group_lists'] = <<<_P
Listas
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Colores
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Límites
_P;

$tsep_lng['config_group_logging'] = <<<_P
Registrando
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Interfaz del usuario
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Límites
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Resultados
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Sugerencia de Búsqueda
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
Buscando
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Horas de diferencia entre la hora del servidor y la hora local. Ajústelo adecuadamente
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
¿Cuantas sugerencias de búsqueda se mostrarán (0=off)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
Debería la caja de sugerencias de búsqueda mostrar el numero de paginas retornadas a una consulta?
_P;

$tsep_lng['config_show_popular'] = <<<_P
Debería la caja de sugerencias de búsqueda mostrar la popularidad de una consulta?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
¿Qué método de cálculo devuelve para el número de páginas?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Cuando se este registrando una consulta de búsqueda:<br /> 1 = Usar resultados de la ultima consulta de búsqueda<br /> 2 = Calcular el promedio de todas las consultas<br /> 3 = Calcular el mínimo de todas las consultas<br /> 4 = Calcular el máximo de todas las consultas
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
¿Cuántos caracteres se muestran después del primer resultado?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
El resultado de la búsqueda será solamente una parte del texto completo indexado. Esta entrada define cuántos caracteres se mostrarán DESPUÉS del primer resultado encontrado
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
¿Cuántos caracteres se muestran antes del primer resultado?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
El resultado de la búsqueda será solamente una parte del texto completo indexado. Esta entrada define cuántos caracteres se mostrarán ANTES del primer resultado encontrado
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Si el usuario no puede fijar el número de resultados a mostrar, entonces se usará este valor por defecto (el usuario obtendrá estos resultados antes de obtener la página de navegación)
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
¿Cuántos bloques se mostrarán?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
El resultado de la búsqueda será solamente una parte del texto completo indexado. Esta entrada define cuántos bloques se mostrarán como máximo
_P;

$tsep_lng['config_internal_notes'] = <<<_P
Notas internas
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Este campo puede usarse para notas internas. Solamente son visibles para el administrador en este área
_P;

$tsep_lng['config_Language'] = <<<_P
¿Que idioma desea que muestre su TSEP? Ejemplo: si desea utilizar Español introduzca 'es', si desea Inglés introduzca 'en', si desea Alemán introduzca 'de'.
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
Muestra solamente la lista de ficheros que se indexarán
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
El indexador no construye un índice, solamente lista todos los archivos que podrían indexarse. <br> Además, se muestra una lista de archivos y directorios que se descartarán
_P;

$tsep_lng['config_Logging'] = <<<_P
¿Desea que se efectúen registros?
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
¿Registrar las direcciones IP?
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
¿Registrar los clicks en los resultados de la búsqueda?
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
¿Registrar los términos de búsqueda?
_P;

$tsep_lng['config_max_hints'] = <<<_P
Número de términos de búsqueda marcados para cada frase
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
Este número define la cantidad máxima de términos de búsqueda que contendrá cada frase
_P;

$tsep_lng['config_max_length'] = <<<_P
Máxima longitud de la frase (en caracteres)
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Las frases con un número mayor que los caracteres definidos no se mostrarán
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
¿Cuántas entradas indexadas desea mostrar en cada página de un documento html? Tenga cuidado de no establecer un número demasiado elevado, ya que la página podría resultar muy grande
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
¿Cuántas páginas indexadas desea mostrar en cada página de modificación de un documento html? Tenga cuidado de no establecer un número demasiado elevado, ya que la página podría resultar muy grande
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
¿Cuántas entradas de registro desea ver por página?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
¿Cuántas palabras excluí­das desea ver por página?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
¿Mostrar el número de página en la lista de resultados?
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Si se muestra el número de página en la lista de resultados, mostrar lo siguiente después del número:
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Si se muestra el número de la página en la lista de resultados, mostrar lo siguiente antes del número:
_P;

$tsep_lng['config_Pagerank'] = <<<_P
¿Cuál es su sí­mbolo de rango de la página?.Ejemplo: *. Puede tambien introduci ralgo de HTML pero evite caracteres especiales. Ejemplo: <�img src="graphics/tsepranks-single.png" alt="*"�>.  Atención: Lo que introduzca aquí­ se mostrará tantas veces como una palabra de búsqueda sea encontrada en la página.
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
¿Desea mostrar el rango de búsqueda?
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Introduzca el parámetro para enviar al script del suministrador de datos:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Este parámetro está disponible para usarse dentro del 'suministrador de datos' externo. Por ejemplo, un nombre de archivo html donde el 'crawler/spider' empezaría su búsqueda (vea documentación para los detalles)
_P;

$tsep_lng['config_Path'] = <<<_P
Defina donde está la ruta a su TSEP. Ejemplo: si el archivo search.php está situado en www.sudominio.com/php/tsepsearch/search.php deberá indicar 'php/tsepsearch'
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Muestra la lista de archivos indexados
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
El indexador arrancará el script del suministrador de datos
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
El indexador inicia el script del suministrador de datos para retirar los archivos a indexar (vea documentación para más detalles)
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
El indexador buscará archivos con un escaneado del directorio
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Le dice al indexador que recoja los archivos a indexar por medio de un escaneado del directorio, comenzando por el directorio señalado anteriormente (modo de búsqueda clásico de TSEP)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
¿Puede establecer el usuario cuántos resultados mostrar por página?
_P;

$tsep_lng['config_word_offset'] = <<<_P
Número de palabras mostradas antes/después de cada término de búsqueda
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
El resultado de la búsqueda será solamente una parte del texto indexado completo. Esta entrada
define cuantas palabras se mostrarán antes y despues de cada pulsación.
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
Sólo para programadores: ¿usar la función debugprint()? (estará desactivada para el uso normal de TSEP)
_P;

$tsep_lng['config_XdirName'] = <<<_P
Indexado-directorio de inicio (opcional, relativo a 'indexer.php' ó absoluto):
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
Se necesita la definición de indexado-directorio de inicio: <strong> en casos especiales solamente, </strong> normalmente (<strong> simplemente lo deja vacío y </strong> !<br>). Puede necesitar introducir algo como ../../ ó www/htdocs/youraccount/ 
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Introduzca la dirección del directorio web *:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Este es el direccionamiento web que corresponde a la carpeta indicada anteriormente. Por ejemplo, "http://www.nombredelsitio.com".
_P;

$tsep_lng['configuration'] = <<<_P
Configuración
_P;

$tsep_lng['copyright'] = <<<_P
Copyright

_P;

$tsep_lng['create_new_index'] = <<<_P
Crear un nuevo índice
_P;

$tsep_lng['data_retrieved'] = <<<_P
Información obtenida de la base de datos en
_P;

$tsep_lng['day_friday'] = <<<_P
Viernes
_P;

$tsep_lng['day_friday_short'] = <<<_P
Vie
_P;

$tsep_lng['day_monday'] = <<<_P
Lunes
_P;

$tsep_lng['day_monday_short'] = <<<_P
Lun
_P;

$tsep_lng['day_saturday'] = <<<_P
Sábado
_P;

$tsep_lng['day_saturday_short'] = <<<_P
Sáb
_P;

$tsep_lng['day_sunday'] = <<<_P
Domingo
_P;

$tsep_lng['day_sunday_short'] = <<<_P
Dom
_P;

$tsep_lng['day_thursday'] = <<<_P
Jueves
_P;

$tsep_lng['day_thursday_short'] = <<<_P
Jue
_P;

$tsep_lng['day_tuesday'] = <<<_P
Martes
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
Mar
_P;

$tsep_lng['day_wednesday'] = <<<_P
Miércoles
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
Mié
_P;

$tsep_lng['delete'] = <<<_P
Eliminar
_P;

$tsep_lng['delete_file'] = <<<_P
Borrar archivo
_P;

$tsep_lng['transform'] = <<<_P
Transformar
_P;

$tsep_lng['details'] = <<<_P
Detalles
_P;

$tsep_lng['directory'] = <<<_P
Directorio
_P;

$tsep_lng['docorrectit'] = <<<_P
¡Por favor, CORRIJA este error ANTES de continuar!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
Error(es), devueltos por el 'script' externo
_P;

$tsep_lng['filename'] = <<<_P
Nombre del archivo
_P;

$tsep_lng['filter'] = <<<_P
Filtro
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
Se encontraron las siguientes palabras excluídas en sus palabras de búsqueda , las cuáles, a petición del administrador, no pueden buscarse y han sido encontradas (hallará información más detallada en "Consejos de Búsqueda")
_P;

$tsep_lng['found_no_pages'] = <<<_P
No se encontraron páginas.
_P;

$tsep_lng['group_level_gap'] = <<<_P
Definición del grupo/nivel: el grupo/nivel tiene que ser exactamente 1 mayor que el grupo/nivel del grupo precedente
_P;

$tsep_lng['help'] = <<<_P
Ayuda
_P;

$tsep_lng['help_copyright'] = <<<_P
Este ví­nculo abre una ventana nueva y le lleva a la página de TSEP en Sourgeforge.net
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
¿Está seguro que quiere eliminar esta página del í­ndice? (si lo hace, eliminará de la base de datos toda información sobre esta página)
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
¿Está seguro de que desea eliminar esta opción?
_P;

$tsep_lng['help_del_stopword'] = <<<_P
¿Está seguro de querer eliminar esta palabra excluí­da?
_P;

$tsep_lng['help_first_page'] = <<<_P
Ir a la primera página
_P;

$tsep_lng['help_last_page'] = <<<_P
Ir a la última página
_P;

$tsep_lng['help_next_page'] = <<<_P
Ir a la página siguiente
_P;

$tsep_lng['help_previous_page'] = <<<_P
Ir a la página anterior
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Por favor, si todavía tiene problemas con su búsqueda o está descontento con los resultados de la misma, háganos saber sus problemas o sugerencias por correo. Gracias.
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
Imposible: el nombre ya existe
_P;

$tsep_lng['index_edit_date'] = <<<_P
Ultima modificación del índice:
_P;

$tsep_lng['index_edit_head'] = <<<_P
Modificar los datos almacenados en el índice
_P;

$tsep_lng['index_edit_title'] = <<<_P
Modificación del índice (detallada)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Ultima fecha de edición: 
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
No editado
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Ultima fecha de indexado:
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
No indexado
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Pulse aqui para modificar los detalles de la página.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Pulse aqui para mostrar la página en el navegador.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Pulse sobre el tí­tulo ó URL de una página para ver los detalles del apunte
_P;

$tsep_lng['index_overview_help'] = <<<_P
Un consejo: Use la función de búsqueda de su navegador para encontrar más rápidamente lo que está buscando
_P;

$tsep_lng['index_overview_title'] = <<<_P
Vista breve del í­ndice (resumen)
_P;

$tsep_lng['indexed_words'] = <<<_P
Vista completa del í­ndice actual (puede ser muy larga)

_P;

$tsep_lng['indexer_title'] = <<<_P
Indexador
_P;

$tsep_lng['indexing_in'] = <<<_P
Indexación hecha en
_P;

$tsep_lng['indexing_on'] = <<<_P
Indexación hecha el 
_P;

$tsep_lng['indexingprofile'] = <<<_P
Perfil de indice
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
No existe el perfil de indexación: nombre de archivo
_P;

$tsep_lng['info_from_extscript'] = <<<_P
Información(es), devuelta(s) por el 'script' externo
_P;

$tsep_lng['intErr'] = <<<_P
Error interno
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
Definición de 'tipo de campo' errónea
_P;

$tsep_lng['is'] = <<<_P
Es
_P;

$tsep_lng['logview_contents'] = <<<_P
Entrada
_P;

$tsep_lng['logview_head'] = <<<_P
A continuación se relacionan todas las entradas del registro
_P;

$tsep_lng['logview_ip'] = <<<_P
IP realizada por entrada de registro
_P;

$tsep_lng['logview_no_IP'] = <<<_P
No registrado
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Fecha del apunte
_P;

$tsep_lng['logview_title'] = <<<_P
Términos de búsqueda y aperturas de página
_P;

$tsep_lng['logview_type'] = <<<_P
Tipo de registro
_P;

$tsep_lng['logview_type_1'] = <<<_P
Términos de búsqueda
_P;

$tsep_lng['logview_type_2'] = <<<_P
Pulsación Resultados
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
IP obtenida
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Palabras excluídas
_P;

$tsep_lng['mandatory'] = <<<_P
* ¡Este es un campo obligatorio! Introduzca un valor, por favor
_P;

$tsep_lng['match_case'] = <<<_P
Coincidir mayúsculas y minúsculas
_P;

$tsep_lng['matches'] = <<<_P
Coincidencias.
_P;

$tsep_lng['month_april'] = <<<_P
Abril
_P;

$tsep_lng['month_april_short'] = <<<_P
Abr
_P;

$tsep_lng['month_august'] = <<<_P
Agosto
_P;

$tsep_lng['month_august_short'] = <<<_P
Ago
_P;

$tsep_lng['month_december'] = <<<_P
Diciembre
_P;

$tsep_lng['month_december_short'] = <<<_P
Dic
_P;

$tsep_lng['month_february'] = <<<_P
Febrero
_P;

$tsep_lng['month_february_short'] = <<<_P
Feb
_P;

$tsep_lng['month_january'] = <<<_P
Enero
_P;

$tsep_lng['month_january_short'] = <<<_P
Ene
_P;

$tsep_lng['month_july'] = <<<_P
Julio
_P;

$tsep_lng['month_july_short'] = <<<_P
Jul
_P;

$tsep_lng['month_june'] = <<<_P
Junio
_P;

$tsep_lng['month_june_short'] = <<<_P
Jun
_P;

$tsep_lng['month_march'] = <<<_P
Marzo
_P;

$tsep_lng['month_march_short'] = <<<_P
Mar
_P;

$tsep_lng['month_may'] = <<<_P
Mayo
_P;

$tsep_lng['month_may_short'] = <<<_P
May
_P;

$tsep_lng['month_november'] = <<<_P
Noviembre
_P;

$tsep_lng['month_november_short'] = <<<_P
Nov
_P;

$tsep_lng['month_october'] = <<<_P
Octubre
_P;

$tsep_lng['month_october_short'] = <<<_P
Oct
_P;

$tsep_lng['month_september'] = <<<_P
Septiembre
_P;

$tsep_lng['month_september_short'] = <<<_P
Sep
_P;

$tsep_lng['more_than_four'] = <<<_P
Por favor, introduzca una cadena de búsqueda de 4 o más caracteres.
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
Atención!: Debido a una versión antigua de la base de datos, la búsqueda no utiliza operadores booleanos. Por ello, todas las palabras que introdujo deben hallarse en el documento para que éste pueda ser encontrado. No se utilizarán los operadores de la búsqueda.
_P;

$tsep_lng['name_already_exists'] = <<<_P
El nombre ya existe
_P;

$tsep_lng['name_is_empty'] = <<<_P
El nombre esta vacío!
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
Volver a la página anterior
_P;

$tsep_lng['new_index_head'] = <<<_P
¡Se ha creado un nuevo í­ndice! <br.> A continuación encontrará la lista de archivos indexados
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Creando nuevo índice...<br /> Por favor, tenga paciencia...
_P;

$tsep_lng['new_window'] = <<<_P
(Nueva ventana)
_P;

$tsep_lng['no_records'] = <<<_P
No hay registros
_P;

$tsep_lng['none'] = <<<_P
Ninguno
_P;

$tsep_lng['nothing'] = <<<_P
Nada
_P;

$tsep_lng['of'] = <<<_P
De
_P;

$tsep_lng['old_index_head'] = <<<_P
A continuación encontrará la lista de los (ANTIGUOS) archivos indexados actualmente en la base de datos
_P;

$tsep_lng['only'] = <<<_P
Unico
_P;

$tsep_lng['only_one_value'] = <<<_P
¡Solamente un valor!
_P;

$tsep_lng['only_one_word'] = <<<_P
¡Solamente una palabra!
_P;

$tsep_lng['page_file_size'] = <<<_P
Tamaño de la página:

_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Palabras 'metatag' indexadas:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Palabras indexadas:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Palabras:
_P;

$tsep_lng['page_number'] = <<<_P
Número de la página:
_P;

$tsep_lng['page_rank'] = <<<_P
x encontradas
_P;

$tsep_lng['page_rank_help'] = <<<_P
Sus palabras de búsqueda han sido encontradas con esta frecuencia en esta página
_P;

$tsep_lng['page_rank_real'] = <<<_P
Rango de esta página (calculado por el número de ocurrencia de todas las palabras de búsqueda encontradas en el documento)
_P;

$tsep_lng['page_title'] = <<<_P
Tí­tulo de página:
_P;

$tsep_lng['page_url'] = <<<_P
Página URL:
_P;

$tsep_lng['pages_found'] = <<<_P
Páginas encontradas.
_P;

$tsep_lng['pages_indexed'] = <<<_P
Páginas indexadas
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
Páginas que no serán indexadas
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
Páginas que serán indexadas
_P;

$tsep_lng['powered_by'] = <<<_P
Desarrollado por
_P;

$tsep_lng['protect_indexentry'] = <<<_P
Proteger entrada de índice (de la reconstrucción o borrado por el indexador)
_P;

$tsep_lng['protected_indexentry'] = <<<_P
Entrada de índice protegida
_P;

$tsep_lng['really_delete'] = <<<_P
¿Borrar realmente?
_P;

$tsep_lng['records'] = <<<_P
Registros
_P;

$tsep_lng['rename'] = <<<_P
Renombrar
_P;

$tsep_lng['results'] = <<<_P
Resultados
_P;

$tsep_lng['results_to_show_user'] = <<<_P
El usuario puede elegir entre el siguiente número de resultados a mostrar por página:
_P;

$tsep_lng['save'] = <<<_P
Guardar
_P;

$tsep_lng['saveas'] = <<<_P
Guardar como
_P;

$tsep_lng['search_tips'] = <<<_P
Consejos de búsqueda
_P;

$tsep_lng['search_tips_desc'] = <<<_P
El motor de búsqueda de TSEP busca por defecto todas las palabras indicadas y despliega la página que contenga todas las palabras de búsqueda facilitadas. El número mí­nimo de caracteres por palabra para realizar una búsqueda es de 4. A continuación encontrará un ejemplo de la búsqueda booleana usada en TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
Buscar páginas que contengan como mí­nimo una de estas palabras.
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
Buscar páginas que contengan ambas palabras.
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
Palabra "apple" y colocar más arriba las que también contengan "macintosh".
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
Palabra "apple" y no contenga "macintosh".
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
"apple" y "pie", o "apple" y "strudel" (en cualquier orden), pero colocando más arriba las que contengan "apple pie" que las que contengan "apple strudel".
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
"apple", "apples", "applesauce" y "applet". * representa 0 o más caracteres y solamente puede ocurrir al final de una palabra de búsqueda.
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
Buscar páginas que contengan exactamente la frase "some words" (por ejemplo, páginas que contengan "some words of wisdom", pero no las que contengan "some noise words").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Consejos para usar TSEP eficazmente
_P;

$tsep_lng['search_tips_help'] = <<<_P
Abre la ayuda en una nueva ventana
_P;

$tsep_lng['search_tips_se1'] = <<<_P
apple banana
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+apple +banana
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+apple macintosh
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+apple -macintosh
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+apple +(>pie <strudel)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
apple*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"some words"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Consejos de búsqueda
_P;

$tsep_lng['search_took'] = <<<_P
La búsqueda tardó
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Una palabra de búsqueda que sea una palabra excluí­da, no se buscará ni marcará en los resultados de la búsqueda. Además, las palabras excluí­das por el usuario pueden ser palabras excluí­das prefijadas por el administrador. Las palabras excluí­das que el administrador ha definido son:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Se han buscado en el sitio las palabras
_P;

$tsep_lng['seconds'] = <<<_P
Segundos
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
Separa multiples valores/definiciones por medio de una coma
_P;

$tsep_lng['show_it'] = <<<_P
Mostrar
_P;

$tsep_lng['show_results_per_page'] = <<<_P
Los resultados se mostrarán por página. Cada cambio recarga la página con el nuevo valor.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
/ Página
_P;

$tsep_lng['sim_index_head'] = <<<_P
Archivos a indexar. <br /> A continuación está la lista de archivos que se ordenarán
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Buscando archivos ... <br /> Por favor, tenga paciencia ...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
Páginas que no serán indexadas (porque están protegidas de acuerdo con las entradas de índice)
_P;

$tsep_lng['sort_asc'] = <<<_P
Orden ascendente A->Z, anteriores->posteriores
_P;

$tsep_lng['sort_desc'] = <<<_P
Orden descendente Z->A, posteriores->anteriores
_P;

$tsep_lng['start_indexing'] = <<<_P
Iniciar la indexación**
_P;

$tsep_lng['stopwords'] = <<<_P
Palabras excluí­das
_P;

$tsep_lng['stopwords_title'] = <<<_P
Palabras excluí­das
_P;

$tsep_lng['to'] = <<<_P
A
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project
_P;

$tsep_lng['type'] = <<<_P
Tipo
_P;

$tsep_lng['update'] = <<<_P
Actualizar
_P;

$tsep_lng['value_already_exists'] = <<<_P
El valor ya existe
_P;

$tsep_lng['value_for'] = <<<_P
Valor para
_P;

$tsep_lng['version'] = <<<_P
Esta es la versión
_P;

$tsep_lng['warning'] = <<<_P
** Por favor, pulse el botón "Iniciar indexación" una sola vez y no cierre la ventana de su navegador hasta que la búsqueda haya terminado. Tampoco ponga en funcionamiento múltiples instancias de este indexador. 
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Palabras excluí­das válidas <br />(no podrán ser buscadas y no serán marcadas en los resultados)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Forzar análisis sintáctico via HTTP
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
El uso de "Forzar análisis sintático via HTTP" tiene (al menos) dos ventajas: el contenido SSI también se analiza y las URL externas a su ámbito local pueden indexarse (por ejemplo, archivos que no pueden leerse directamente via apertura local de archivos). ¡La desventaja es que el proceso de indexado puede ralentizarse enormemente!
_P;

$tsep_lng['error_while_parsing'] = <<<_P
Error(es) durante la lectura ó ánalisis sintáctico
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
*** PRECAUCIÓN ***:  ¡TODOS los índices dependientes seran borrados también, si no se asignan a otros perfiles de indexación!
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Rutas
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Incluir y Excluir
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
Suministrador de datos externo
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Modo de indexación
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Modificadores de indexación
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Varios
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Aplicar filtro
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Eliminar filtro
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Todo
_P;

$tsep_lng['filter_from'] = <<<_P
De:
_P;

$tsep_lng['filter_to'] = <<<_P
A:
_P;

$tsep_lng['filter_date_format'] = <<<_P
YYYY-[M]M-[D]D
_P;

$tsep_lng['filter_time_format'] = <<<_P
HH:MM:SS
_P;

$tsep_lng['logviewstats_title'] = <<<_P
Términos de búsqueda y páginas abiertas: Estadísticas
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Estadísticas de acceso al sistema
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Totales
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Detalles
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Top
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Todas las entradas
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
No resueltas
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Registro de entradas
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Instalaciones y actualizaciones
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Preguntas de búsqueda
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Páginas abiertas
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Dominios únicos
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Direcciones IP únicas
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Palabras de búsqueda únicas
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Palabras excluídas únicas
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Términos de búsqueda
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Páginas abiertas
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Términos de búsqueda unicos
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Palabras excluídas únicas
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Direcciones IP únicas
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Dominios unicos
_P;

$tsep_lng['logviewstats_DrillDown'] = <<<_P
Haga click aquí para ver todas las estadísticas de esta subcategoría
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
<<<<<<< .mine El indexador  ya esta en ejecución:<br />%s ======= <@> El indexador  ya esta en ejecución:<br />%s >>>>>>> .r230
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>Peligro: El PHP safe_mode (modo_seguro) esta activado</b><br /> El maximo tiempo de ejecución que ustes fijo in la pantalla de configuración puede no trabajar en este sistema.<br /> PHP esta fijado por su administrador para detenerse despues de %d minutos.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Información adicional:
_P;

$tsep_lng['ss_search_term'] = <<<_P
Pregunta
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Preguntas previamente usadas de la búsqueda
_P;

$tsep_lng['ss_popular'] = <<<_P
Popular
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Número de veces que se utiliza la pregunta (popularidad)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
RP
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
El número de páginas devuelto por la pregunta
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Vacio (i.e. nada para indexar): �
_P;

$tsep_lng['error_empty_files'] = <<<_P
archivos vacios (i.e. nada para indexar)
_P;

$tsep_lng['display_ranking'] = <<<_P
mostrar el ranking con imágenes
_P;

$tsep_lng['ranking_alt'] = <<<_P
Ingrese un texto alterno para la imagen
_P;

$tsep_lng['ranking_comments'] = <<<_P
Comentarios (interno solamente)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Por favor fije el image-file
_P;

$tsep_lng['ranking_submit'] = <<<_P
Fije la imagen
_P;

$tsep_lng['ranking_delete'] = <<<_P
Borrar imagen
_P;

$tsep_lng['ranking_modify'] = <<<_P
@Modificar imagen
_P;

$tsep_lng['help_del_ranking'] = <<<_P
@¿Esta usted seguro que quiere borrar esta imagen?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
@Usted no puede modificar el porcentaje
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
@¿Esta usted seguro que quiere modificar esta imagen?
_P;

$tsep_lng['ranking_range'] = <<<_P
Fije un paso para mostrar en el porcentaje
_P;

$tsep_lng['ranking_image'] = <<<_P
imagen
_P;

$tsep_lng['ranking_url'] = <<<_P
mostrar (e.g. URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
comentarios
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
HTML ALT atributo
_P;

$tsep_lng['ranking_percent'] = <<<_P
El paso en el porcentaje
_P;

$tsep_lng['setup_Rollback_completed'] = <<<_P
Volcado atrás completado
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Desconocido
_P;

$tsep_lng['setup_Setup'] = <<<_P
Configuración
_P;

$tsep_lng['setup_step1'] = <<<_P
1. Introducción
_P;

$tsep_lng['setup_step2'] = <<<_P
2. Configuración de la base de datos
_P;

$tsep_lng['setup_step3'] = <<<_P
3. Chequeo del sistema
_P;

$tsep_lng['setup_step4'] = <<<_P
4. Configuración
_P;

$tsep_lng['setup_step5'] = <<<_P
5. Instalación
_P;

$tsep_lng['setup_step6'] = <<<_P
6. Sumario
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
Ha presionado el botón de cancelar indicando que  quiere abortar la instalación de <span class="tsep">TSEP</span>.<br /><br /> Por que lo hizo? No se da cuenta de lo que se estará perdiendo? <span class="tsep">TSEP</span> es sin duda el mejor motor de búsqueda en toda la red!!!<br /><br /> Bien… Como quiera! Pero tenga en cuenta lo siguiente:<br /><br /> Presionando el botón de salir terminara la instalación y lo llevara a la pagina de <span class="tsep">TSEP</span> en SourceForge. Cualquier cambio hecho a su sitio web <b>no</b> podrá ser volcado atrás! 
_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
He compuesto mi mente:  ¡Deseo parar!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Parar
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Continúe la configuración
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
¡Lo siento!  Cambie de idea.  Déjeme continuar...
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Lléveme al paso anterior...
_P;

$tsep_lng['setup_Previous'] = <<<_P
Anterior
_P;

$tsep_lng['setup_Next'] = <<<_P
Siguiente
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Lléveme al paso siquiente...
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
Deseo parar de instalar TSEP.
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Cancelar
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Gracias por considerar el uso de <span class="tsep">TSEP</span>.<br /><br /> Esta instalando <span class="tsep">TSEP</span>. Este instalador lo llevara a través del proceso de instalación o actualización de <span class="tsep">TSEP</span>. En la parte izquierda de la pantalla usted vera los pasos a tomar antes de que la instalación sea completada. Usted podrá rastrear el proceso de la instalación al revisar estos pasos.<br /><br /> Hemos tomado mucho cuidado al seleccionar las opciones por defecto para usted. Si esta es su primera instalación le sugerimos que acepte los valores por defecto y luego los modifique a la vez que vaya aprendiendo a usar <span class="tsep">TSEP</span>. Si usted esta realizando una actualización desde una versión mas antigua de <span class="tsep">TSEP</span> el instalador determina su configuración antigua. Usted podrá copiarla en la nueva instalación o aceptar los valores por defecto.<br /><br /> Esperamos que <span class="tsep">TSEP</span> sea una herramienta valiosa para su sitio web.<br /> Si tiene preguntas o comentarios por favor contáctenos a través de nuestro foro en nuestro <a href="http://sourceforge.net/projects/tsep/" target="blank">sitio en SourceForge</a>.<br /><br /> El Equipo <span class="tsep">TSEP</span><br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Por favor ingrese la informacón, TSEP necesita tener acceso a su base de datos y scripts.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Servidor de la base de datos:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Ingrese el URL para el servidor MySQL. En la mayoria de los casos esto es \'localhost\'.<br /><br />Si usted no esta seguro acepte el predeterminado.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Usuario de la base de datos:
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
El nombre del usuario que ustes usa para ingresar al MySQL
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Contraseña de la base de datos:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
Su contraseña al nombre del usuario de arriba.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Nombre de la base de datos:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
¿Cuál es el nombre de la base de datos que usted creó para TSEP?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Forzar la creación de la base de datos:
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
Si su valor actual es SI el instalador intentara crear la base de datos por usted.<br /><br />Si la base de datos ya existe el instalador no la modificara y continuara con el proceso
_P;

$tsep_lng['setup_Yes'] = <<<_P
Si
_P;

$tsep_lng['setup_No'] = <<<_P
No
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Prefijo de la tabla:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
Si su servidor web le permite solamente una base de datos usted puede cerciorarse de que los nombres de la tabla sean únicos incorporando un prefijo aquí.<br /><br />Si usted no esta seguro acepte el valor predeterminado.
_P;

$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
<span class="tsep">TSEP</span> directorio raiz:
_P;

$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
El directorio raíz de TSEP, relativo a su directorio raíz de documentos.<br /><br />Esto es correcto probablemente. Si no sabe el nombre del directorio acepte este nombre por defecto.
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Ruta absoluta para el<br /> directorio raiz del <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
La ruta absoluta para el directorio raiz del TSEP.<br /><br />Si usted no sabe el nombre del directorio acepte el predeterminado.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Ruta absoluta para el<br /><span class="tsep">TSEP</span> temp-directory:
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
La ruta absoluta para el TSEP temp-directory.<br /><br />Tiene que tener permisos de escritura.
_P;

$tsep_lng['setup_UnknownDBHost'] = <<<_P
Usted especifico un servidor de base de datos desconocido.<br />Por favor chequee la información e intente de nuevo.
_P;

$tsep_lng['setup_NoDBAccess'] = <<<_P
El Acceso a la base de datos es denegado.<br />Esto significa que el usuario o la contraseña (o ambos) son invalidos.
_P;

$tsep_lng['setup_ConnectionDenied'] = <<<_P
Hay un error desconocido al conectar al MySQL.<br />¿Esta abosulamente seguro que la configuración MySQl es correcta?<br />¿La configuración de abajo es correcta?
_P;

$tsep_lng['setup_DBNotExists'] = <<<_P
La base de datos que usted especifico no existe<br />y yo no puedo crearla para usted.
_P;

$tsep_lng['setup_DBNameWrong'] = <<<_P
El nombre de la base de datos especificado no es correcto<br />(la base de datos no existe).
_P;

$tsep_lng['setup_DBUnknownError'] = <<<_P
Hay un error desconocido conectando a la base de datos.<br />¿Esta usted absolutamente seguro que la configuración MySQL es correcta?<br />¿Esta la configuracion de abajo correcta?
_P;

$tsep_lng['setup_TSEPRootWrong'] = <<<_P
El directorio raiz del TSEP no es correcto.
_P;

$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
La ruta absoluta para el directorio raiz del TSEP no es correcto.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
La ruta absoluta para el TSEP temp-directory no existe (i.e. mkdir() no era posible)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
La ruta absoluta para el TSEP temp-directory: incapaz de escribir en el directorio.
_P;

$tsep_lng['setup_HTAccessNotFound'] = <<<_P
.htaccess no encontrado
_P;

$tsep_lng['setup_OK'] = <<<_P
ok
_P;

$tsep_lng['setup_NoProtectionFound'] = <<<_P
Ninguna cláusula de protección encontrada.
_P;

$tsep_lng['setup_Global_1'] = <<<_P
<b>Importante:</b> Usted solo necesita tomar este paso si el instalador es incapaz de escribir los datos de conexión a la base de datos en el archivo "/include/global.php".<br />
_P;

$tsep_lng['setup_Global_2'] = <<<_P
Por favor tome los siguientes pasos para un correcto patcheo del archivo global.php.<br />
_P;

$tsep_lng['setup_Global_3'] = <<<_P
Copie la informacion en el frame de abajo.
_P;

$tsep_lng['setup_Global_3s1'] = <<<_P
Abra el archivo "/include/global.php" en su disco duro.
_P;

$tsep_lng['setup_Global_3s21'] = <<<_P
Reemplace el codigo entre los separadores
_P;

$tsep_lng['setup_and'] = <<<_P
y
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
, asegurándose de no reemplazar las líneas con los separadores mismos sino solo las líneas entre estos.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Grabar el archivo.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Suba el archivo al directorio /include de su sitio web sobre escribiendo el archivo antiguo.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Pulse en el boton "Proximo" al pie de esta pagina.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
Si todo salio bien usted podrá continuar con la configuración e instalación de <span class="tsep">TSEP</span> correctamente.<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
aplique el parche manualmente
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
Si el instalador no puede salvar los datos de conexión por favor presione aquí y siga las instrucciones.
_P;

$tsep_lng['setup_warning'] = <<<_P
peligro
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
El chequeo de sistema revela la siguiente información. Por favor revise cuidadosamente y corrija cuando sea necesario.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
Versión MySQL:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
La versión de MySQL que esta corriendo debe ser la v.3.23 o superior para poder aprovechar las características avanzadas de TSEP.<br /><br />Si usted desea obtener el máximo rendimiento de TSEP use la versión 4.1 o superior.<br /><br />No podemos garantizar el comportamiento apropiado con versiones mas antiguas.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
Versión PHP:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP es probado con PHP versión 4.2 y superiores.<br /><br />No podemos garantizar el comportamiento apropiado con versiones antiguas.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Versión antigua del <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
Esta es solo alguna información.<br/><br/>Muestra la versión de TSEP que esta actualizando (si presente).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
Nueva <span class="tsep">TSEP</span> versión:
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
Esta es solo alguna información.<br/><br/>Muestra la versión de TSEP que esta instalando en este momento
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Archivo de configuración de la base de datos:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
El archivo conteniendo los datos de conexión debe tener permisos de escritura para que el instalador funcione correctamente.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Por favor cambie los permisos del archivo \'include/global.php\' por medio del comando chmod a \'666\'.<br /><br />Si el archivo no tiene permisos de escritura puede proceder al presionar NEXT. El instalador intentara cambiar las propiedades del archivo a escribible.<br /><br />Si esto falla usted tendrá que usar el enlace de descarga para obtener la configuración correcta. Por favor siga las instrucciones en la página de descarga.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Escribible (con permisos de lectura)
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
No escribible (sin permisos de lectura)
_P;

$tsep_lng['setup_PHPSafeMode'] = <<<_P
PHP Modo seguro:
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
Si el safe_mode de PHP esta <b>HABILITADO</b> algunas características in TSEP no funcionaran.<br /><br />Esto no es critico. Si usted no tiene una razón de peso para cambiar este valor simplemente déjelo como esta.
_P;

$tsep_lng['setup_On'] = <<<_P
Encendido
_P;

$tsep_lng['setup_Off'] = <<<_P
Apagado
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Seguridad del área de administración:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
Usted debería proteger el área de administración con una contraseña usando el archivo <i>.htaccess</i> (si esta usando Apache) ).<br /><br />Si no ha protegido el área de administración cualquier persona puede cambiar su configuración.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Protegido
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Incluya la seguridad del directorio:
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
Usted debería proteger el directorio include del archivo <i>.htaccess</i> (Si esta usando Apache).<br /><br />El no proteger dicho directorio es un riesgo de seguridad ya que su nombre de usuario/ contraseña son almacenados ahí.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
El archivo de configuración de la base de datos no tiene permisos de escritura.<br />Por favor presione >parchear manualmente < para resolver el problema.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
El instalador necesita su decisión  en los problemas a continuación. Estos valores determinan lo que se copia de la versión antigua a la versión nueva (si es aplicable).<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Instalación nueva (con valores por defecto):
_P;

$tsep_lng['setup_Fresh_Help'] = <<<_P
Si desea instalar una copia nueva de TSEP con solo los valores por defecto, ajuste el valor de esta opción a <b>SI</b>. El instalador hará caso omiso de configuraciones, ajustes, perfiles, etc. e instalara la versión básica de TSEP.
_P;

$tsep_lng['setup_Update'] = <<<_P
Actualice desde la versión antigua:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
Si usted esta actualizando TSEP y desea preservar sus ajustes seleccione <b>SI</b>. En este caso los prefijos de las tablas de las versiones nueva y antiguas deben coincidir.<br /><br />Si esta instalando una nueva copia de TSEP o no desea sobrescribir  las tablas antiguas seleccione <b>NO</b>. Asegúrese de que el prefijo de la tabla sea único!
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Copiar configuración antigua:
_P;

$tsep_lng['setup_CopyOld_Help'] = <<<_P
Si esta actualizando TSEP y desea preservar su <u>configuración</u> antigua seleccione <b>SI</b>.<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Copiar perfilos antiguos:
_P;

$tsep_lng['setup_CopyOldProfiles_Help'] = <<<_P
Si esta actualizando TSEP y quiere preservar sus <u>perfiles</u> antiguos seleccione <b>SI</b>.<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Copiar indices antiguos:
_P;

$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
Si esta actualizando TSEP y desea preservar sus antiguos <u>índices</u> seleccione <b>SI</b>.<br /><br />Si desea copiar los índices tiene que copiar también los perfiles!<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Copiar palabras antiguas de pare:
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
Si esta actualizando TSEP y quiere preservar sus antiguas <u>palabras de pare</u> seleccione <b>SI</b>.<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Copiar registros antiguos:
_P;

$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
Si esta actualizando TSEP y desea preservar sus <u>archivos de registro</u> antiguos seleccione <b>SI</b>.<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Copiar símbolos de rango antiguos:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
Si esta actualizando TSEP y desea preservar sus <u>símbolos de rango</u> antiguos seleccione <b>SI</b>.<br /><br />Solo funciona si \'<i>Actualizar</i>\' tiene un valor de SI.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
Usted ha indicado que no quiere realizar una actualizacion de su sistema antiguo<br />pero especifico un prefijo de tabla que es igual al que esta en uso.
_P;

$tsep_lng['setup_IndicateUpdate'] = <<<_P
Usted ha indicado que no quiere realizar una actualización de su sistema antiguo<br />pero especifico un prefijo de tabla que es igual al que esta en uso.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Error fatla:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Grabando tablas antiguas
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
No puede abrirse
_P;

$tsep_lng['setup_Can_not_write_to'] = <<<_P
No puede escribir a
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Copiando configuración
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Copiando índices
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Copiando enlaces de perfil-a-índice
_P;

$tsep_lng['setup_Copying_profiles'] = <<<_P
Copiando profiles
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Copiando entradas del registro
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Copiando hits del registro
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Copiando stopwords
_P;

$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Copiando símbolos de rango
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
¡Felicitaciones!  La instalación se termina con éxito.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Por favor continúe con la pantalla de resumen para concluir.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
El instalador se encuentra realizando la instalación de <span class=\"tsep\">TSEP</span> versión
_P;

$tsep_lng['setup_DoNotInterrupt'] = <<<_P
Por favor no interrumpa este proceso: terminara con una configuración rota si lo hace.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Progreso:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Borrando tablas antiguas:
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Creando nuevas tablas
_P;

$tsep_lng['setup_Populating_new_tables'] = <<<_P
Nuevas tablas de popularidad
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
Usted ha acabado de instalar el < palmo class="tsep">TSEP</span > versión 
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Sumario de instalación
_P;

$tsep_lng['setup_Settings'] = <<<_P
Ajustes:
_P;

$tsep_lng['setup_records_copied'] = <<<_P
registros copiados
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 registros copiados
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
No seleccionado para actualización
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Perfiles:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Indices:
_P;

$tsep_lng['setup_Stopwords'] = <<<_P
Palabras de parada:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Registros:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Símbolos de rango:
_P;

$tsep_lng['setup_Important'] = <<<_P
Importante:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Por favor recuerde <u>proteger</u> el área de <u>administración</u> y el <u>directorio include</u> si no lo ha hecho hasta ahora. Además <u>borre</u> el archivo <u>/admin/setup.php</u> para que su configuración no pueda ser molestada por hackers.
_P;

$tsep_lng['setup_TakeMe2Config'] = <<<_P
Lléveme a la configuración...
_P;

$tsep_lng['setup_Finish'] = <<<_P
Final
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Introducción
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Configuracion de la base de datos
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
Chequeo del sistema
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Configuración
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Instalación
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Sumario
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
No se enviarán ningunos datos a tsep.info
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Antes que usted finalice
_P;

$tsep_lng['setup_finishText1'] = <<<_P
Nos gustaría recibir datos anónimos estadísticos. Enviar los datos es completamente anónimo y opcional. La lista a continuación muestra los datos que nos gustaría recolectar. Usted puede seleccionar los datos que desea enviarnos o puede decidir no enviar nada en lo absoluto.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
Si escoge el enviar data y ayudar de esta forma al desarrollo de TSEP, primero será transferido a <a href=\"http://www.tsep.info\" target=\"blank\">www.tsep.info</a> donde los datos son enviados a la base de datos. Entonces usted será llevado automáticamente a la pantalla de configuración en su sitio web para empezar a trabajar con <span class=\"tsep\">TSEP</span>.<br />
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Nótese que si decide enviar datos su URL será transmitida incluso si no la desea enviar. Esto es debido a que necesitamos saber a donde debemos enviarlo después de escribir las estadísticas. En este caso su URL no será registrada!
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Si usted decide no enviar datos será llevado directamente a la pantalla de configuración sin conectarse a la pagina de <span class=\"tsep\">TSEP</span>.<br /> En ambos casos la próxima pantalla que vera en su navegador es la pantalla de configuración de su instalación de <span class=\"tsep\">TSEP</span>.
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Déjenos saber que ha instalado <span class="tsep">TSEP</span> exitosamente:
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
Esto nos hará saber que ha instalado TSEP exitosamente.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
Nueva versión de <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
Ésta es la versión de TSEP que usted acaba de instalar.
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Versión antigua del <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
La versión de TSEP que ha reemplazado (si aplica).
_P;

$tsep_lng['setup_Referer'] = <<<_P
Registre su referente:
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
El dominio de su sitio web. Nos gustaría registrarlo y posiblemente tomar una captura de pantalla de su sitio en acción.<br /><br />Tenga en cuenta que si selecciona cualquiera de las otras opciones su URL es automáticamente transferida a nuestro sitio. Esto no quiere decir que la registraremos. Si ajusta esta opción a <b>NO</b> nosotros <b>no</b> la almacenaremos en nuestra base de datos.
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Suscribir al boletín de noticias:
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
Si desea suscribirse a nuestro boletín de noticias para estar al día con las ultimas noticias de TSEP digite su dirección de correo electrónico aquí.<br /><br/>Si no esta interesado simplemente deje el campo en blanco.<br /><br />Nota: Para terminar la suscripción vaya a nuestro sitio web. Este campo solo funcionara para suscripciones.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
El URL que enviaríamos:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
El Javascript tiene que estar activado para hacer el trabajo anterior.

_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Indexación iniciada
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Buscando los archivos...
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Construyendo el indice (para %d archivos)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
Indexer-startdirectory no existe: <b>%s</b>
_P;

$tsep_lng['all_pages'] = <<<_P
Todas las páginas
_P;

$tsep_lng['modified_created'] = <<<_P
Modificado/Creado el
_P;

$tsep_lng['configure'] = <<<_P
Configurar
_P;

$tsep_lng['name'] = <<<_P
Nombre
_P;

$tsep_lng['manage'] = <<<_P
Gestionar
_P;

$tsep_lng['comment'] = <<<_P
Comentario
_P;

$tsep_lng['delete_complete'] = <<<_P
Archivo eliminado con éxito!
_P;

$tsep_lng['err_deleting_file'] = <<<_P
Fallo en la eliminación del archivo!
_P;

$tsep_lng['err_fwrite'] = <<<_P
Error escribiendo el archivo %s
_P;

$tsep_lng['back'] = <<<_P
Atrás
_P;

$tsep_lng['close'] = <<<_P
Cerrar
_P;

$tsep_lng['run'] = <<<_P
Ejecutar
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
El directorio de destino no existe
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
El directorio no existe
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
El archivo no existe
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
El tamaño de archivo excede la definición upload_max_filesize del archivo php.ini de %s
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
El tamaño de archivo escede el máximo max_filesize de %d
_P;

$tsep_lng['destinationfile'] = <<<_P
Fichero de destino
_P;

$tsep_lng['send_this_file'] = <<<_P
Enviar este archivo
_P;

$tsep_lng['delete_this_file'] = <<<_P
Eliminar este archivo
_P;

$tsep_lng['wrong_fileext'] = <<<_P
Extensión errónea: %s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Extensión %s suministrada en lugar de %s
_P;

$tsep_lng['config_group_configcontentimg_basicdefs'] = <<<_P
Definiciones básicas
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_paths'] = <<<_P
Rutas
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_image'] = <<<_P
Imágenes
_P;

$tsep_lng['config_configcontentimg_webpath'] = <<<_P
Ruta de imágenes para Acecso-Web
_P;

$tsep_lng['config_configcontentimg_abspath'] = <<<_P
Ruta de imágenes para Acceso-PHPscript
_P;

$tsep_lng['config_configcontentimg_abspath_help'] = <<<_P
Ruta absoluta (fíisica) al directorio de imágenes, que sea accesible vía scripts php (equivalente a la Ruta de Imágenes para Acceso-Web)
_P;

$tsep_lng['config_configcontentimg_imageext_help'] = <<<_P
Preferiblemente use '.jpeg', '.jpg' o '.png'.  NO CAMBIAR, si las imágenes ya existen, porque dichas imágenes ya no podrían ser encontradas.
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage'] = <<<_P
Imgen por defecto
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans'] = <<<_P
Ejecutar tranformación automáticamente
_P;

$tsep_lng['config_group_configcontentimg_extdefs'] = <<<_P
Definiciones extendidas
_P;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans'] = <<<_P
Transformaciones
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1'] = <<<_P
Transformación 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename'] = <<<_P
Nombre del fichero de plantilla
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active'] = <<<_P
Activo
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active_help'] = <<<_P
Si se ejecuta una transformación, la transformación 1 se incluirá.  (Si las transformaciones 1 y 2, están ambas inactivas, no se realizará ninguna transformación)
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes'] = <<<_P
Notas internas a la Transformación 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment'] = <<<_P
La línea de comentario empieza con
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help'] = <<<_P
Defina una cadena para ser usada como 'prefijo' para líneas de comentario (p. ej. use '#' para una tranformación a scripts shell, o 'REM' para transformaciones a ficheros .BAT de DOS)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2'] = <<<_P
Transformación 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename'] = <<<_P
Nombre del archivo de plantilla
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active'] = <<<_P
Activo
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active_help'] = <<<_P
Si se ejecuta una transformación, la transformación 2 se incluirá.  (Si las transformaciones 1 y 2, están ambas inactivas, no se realizará ninguna transformación)
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes'] = <<<_P
Notas internas a la Transformación 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help'] = <<<_P
Activo Este campo puede ser usado para notas internas
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment'] = <<<_P
La línea de comentario empieza con
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help'] = <<<_P
Defina una cadena para ser usada como 'prefijo' para líneas de comentario (p. ej. use '#' para una tranformación a scripts shell, o 'REM' para transformaciones a ficheros .BAT de DOS)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Apariciones
_P;

?>

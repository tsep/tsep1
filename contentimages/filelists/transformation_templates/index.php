<?php  
/* 

   function that reads directory content and  
   returns the result as links to every file in the directory 
   also it disply type wheather its a file or directory 

  
    for any help please contact Chetan Akarte... 

*/  
function DirDisply() {  
      
     $TrackDir=opendir(".");  
      
     while ($file = readdir($TrackDir)) {  
          
      if ($file == "." || $file == "..") { }  
         else { 
             echo "<tr><td><a href=\"$file\">$file</a> </td>"; 
             echo "<td>  (".filetype($file).")</td></tr><br>"; 
                  
          } 
        
     }  
     closedir($TrackDir);  
    return true;
}  

?> <b>List of files in this Directory</b> 
<p> 
<?php  
DirDisply();  
?> 

// Permette di leggere online l'ebook selezionato e aprirlo in una nuova pagina
function readOnline(){
    var title = document.getElementById('titleEbook').innerText;
    var pdfUrl = "./assets/ebook/"+title+".pdf";
    console.log(title);
    window.open(pdfUrl, '_blank');
}

// Permette di scaricare l'ebook selezionato solo se si è registrati
function downloadEbook(){
    var title = document.getElementById('titleEbook').innerText;
    var pdfUrl = "./assets/ebook/"+title+".pdf";
    console.log(title);
    var link = document.createElement('a');
    link.href = pdfUrl;
    link.download = title+'.pdf';
    link.dispatchEvent(new MouseEvent('click'));
}

function redirect(){
    $(window).on('load', function(){
        $(document).ready(function () {
            window.setTimeout(function () {
                location.href = "../../index.php";
            }, 3000);
        });
    });
}
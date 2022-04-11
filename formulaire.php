<?php
try
{
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=formulairefacture;charset=utf8', 'root', 'jsjxqr6t');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table
$sqlQuery = "SELECT *   FROM article ";
$referenceStatement = $mysqlClient->prepare($sqlQuery);
$referenceStatement->execute();
$reference = $referenceStatement->fetchAll();
//var_dump($reference);

// On affiche chaque recette une à une
foreach ($reference as $value) {


    
?>
 
<?php


}
?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Facturation</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <header>
            

        <form action="insert.php" method="post">





            <h1>Facturation</h1>

         <address class="t1" contenteditable>
          <p>[Votre nom]</p>
          <p>[Adresse de l'entreprise]<br>[Code postal, Ville]</p>
          <p>[Téléphone]</p>
        </address>
        <address class="t2" contenteditable>
          <p>[Nom de l'entreprise client]<br>[Nom du client]</p>
        </address>
        </header>
        <article>
            <h1>Recipient</h1>
            <table class="meta">
                <tr>
                    <th><span>Facture #</span></th>
                    <td><span contenteditable></span></td>
                </tr>
                <tr>
                    <th><span>Date</span></th>
                    <td><span contenteditable></span></td>
                </tr>
                <tr style="display:none"> 
                    <th><span>Montant dû</span></th>
                    <td><span id="prefix" contenteditable>€</span><span></span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
            <th><span>Référence</span></th>
                        <th><span>Description</span></th>
                        <th><span>PU HT</span></th>
                        <th><span>Quantité</span></th>
                        <th><span>Total HT</span></th>
                        <th><span>TVA</span></th>
                         <th><span>Total TTC</span></th>

                    </tr>
                </thead>
                <tbody>
                   
         
                </tbody>
            </table>
            <!--<a class="add">+</a> -->
            <table class="balance">
            <label for="pet-select">Choose a model:</label>







            
           
<select onchange="clickSelect(this)" name="pets" id="pet-select">
<option value="">choiser un reference </option>
<?php foreach ($reference as $value) {?>
   
    <option data-reference="<?php echo $value['reference']?>"
    data-description="<?php echo $value['description']?>"
    data-prix="<?php echo $value['prix-unitaire-ht']?>"
     data-tva="<?php echo $value['taux-tva']?>"
      value="CONNECTEUR CENTRAL EN ACIER INOXYDABLE">
 <?php echo $value['reference']; ?>    
  <?php echo $value['description']; ?>  
   <?php echo $value['prix-unitaire-ht'].'€'; ?>
   <?php echo $value['taux-tva'].'%'; ?></option>
    <?php  } ?>




</select>

                <tr>
                    <th><span>Montant total HT</span></th>
                    <td><span data-prefix>€</span><span>0.00</span></td>
                </tr>
                <!--<tr>
                    <th><span>Montant payé</span></th>
                    <td><span data-prefix>€</span><span contenteditable>0.00</span></td>
                </tr>-->
                <tr>
                    <th><span>Total TTC</span></th>
                    <td><span data-prefix>€</span><span>0.00</span></td>
                </tr>
            </table>
        </article>
        <aside>
            <h1><span>Notes</span></h1>
            <div contenteditable>
                <p>.............</p>
            </div>
        </aside>

        <input type="submit" value="test">
</form>
        <script language="javascript">

   <!--
        (function (document) {
    var
    head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
    elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
    elementsLength = elements.length,
    elementsIndex = 0,
    element;

    while (elementsIndex < elementsLength) {
        element = document.createElement(elements[++elementsIndex]);
    }

    element.innerHTML = 'x<style>' +
        'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
        'audio[controls],canvas,video{display:inline-block}' +
        '[hidden],audio{display:none}' +
        'mark{background:#FF0;color:#000}' +
    '</style>';

    return head.insertBefore(element.lastChild, head.firstChild);
})(document);

/* Squelette */

(function (window, ElementPrototype, ArrayPrototype, polyfill) {
    function NodeList() { [polyfill] }
    NodeList.prototype.length = ArrayPrototype.length;

    ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
    ElementPrototype.mozMatchesSelector ||
    ElementPrototype.msMatchesSelector ||
    ElementPrototype.oMatchesSelector ||
    ElementPrototype.webkitMatchesSelector ||
    function matchesSelector(selector) {
        return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
    };

    ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
    ElementPrototype.mozAncestorQuerySelectorAll ||
    ElementPrototype.msAncestorQuerySelectorAll ||
    ElementPrototype.oAncestorQuerySelectorAll ||
    ElementPrototype.webkitAncestorQuerySelectorAll ||
    function ancestorQuerySelectorAll(selector) {
        for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
            if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
        }

        return newNodeList;
    };

    ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
    ElementPrototype.mozAncestorQuerySelector ||
    ElementPrototype.msAncestorQuerySelector ||
    ElementPrototype.oAncestorQuerySelector ||
    ElementPrototype.webkitAncestorQuerySelector ||
    function ancestorQuerySelector(selector) {
        return this.ancestorQuerySelectorAll(selector)[0] || null;
    };
})(this, Element.prototype, Array.prototype);

/* tableau */


function generateTableRow() {
   
   //pet-select
   reference = jQuery('#pet-select').find(':selected').attr('data-reference');
   prix = jQuery('#pet-select').find(':selected').attr('data-prix');
   tva = jQuery('#pet-select').find(':selected').attr('data-tva');
   description = jQuery('#pet-select').find(':selected').attr('data-description');

   var emptyColumn = document.createElement('tr');

   emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable>'+reference+'</span></td>' +
       '<td><span contenteditable>'+description+'</span></td>' +
       '<td><span data-prefix>€</span><span contenteditable>'+prix+'</span></td>' +
       '<td><span contenteditable>1</span></td>' +
       '<td><span data-prefix>€</span><span>'+tva+'</span></td>';

   return emptyColumn;
}
function clickSelect(obj) {
   if(jQuery(obj).val() == '') return false;
   
   //pet-select
   reference = jQuery(obj).find(':selected').attr('data-reference');
   prix = jQuery(obj).find(':selected').attr('data-prix');
   tva = jQuery(obj).find(':selected').attr('data-tva');
   prixttc=(prix*(1+(tva/100)));
   description = jQuery(obj).find(':selected').attr('data-description');

 

   row = '<tr><td><a class="cut">-</a><span>'+reference+'</span></td>' +
       '<td><span contenteditable>'+description+'</span></td>' +
       '<td><span data-prefix>€</span><span>'+prix+'</span></td>' +
       '<td><span contenteditable>1</span></td>' +
       '<td><span data-prefix>€</span><span>'+prix+'</span></td>'+
       '<td><span>%</span><span>'+tva+'</span></td>'+
       '<td><span data-prefix>€</span><span>'+prixttc+'</span></td></tr>';

   jQuery('.inventory tbody').append(row);
}
/* Prix */

function parseFloatHTML(element) {
    return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
}

function parsePrice(number) {
    return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|€))/g, '$1,');
}

/* MaJ des prix */

function updateNumber(e) {
    var
    activeElement = document.activeElement,
    value = parseFloat(activeElement.innerHTML),
    wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

    if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
        e.preventDefault();

        value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
        value = Math.max(value, 0);

        activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
    }

    updateInvoice();
}

/* MaJ Facture */

function updateInvoice() {
    var total = 0;
    var totalttc = 0;
    var cells, price, total, a, i;

    // MaJ cellules
    // ======================

    for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
        // get
        cells = a[i].querySelectorAll('span:last-child');

        // multiplicateur quantité
        price = parseFloatHTML(cells[2]) * parseFloatHTML(cells[3]);

        tva = parseFloatHTML(cells[5]);

        // total
        total += price;

        // total set
        cells[4].innerHTML = price;


        ttc = (price*(1+(tva/100)));
        totalttc+=ttc;

        cells[6].innerHTML = ttc;
    }

    // MaJ balance
    // ====================

    // get
    cells = document.querySelectorAll('table.balance td:last-child span:last-child');

    // set total
    cells[0].innerHTML = total;
    cells[1].innerHTML = totalttc;

    // set balance
    //cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = parsePrice(total - parseFloatHTML(cells[1]));

    // MaJ Prefixe
    // ========================

    var prefix = document.querySelector('#prefix').innerHTML;
    for (a = document.querySelectorAll('[data-prefix]'), i = 0; a[i]; ++i) a[i].innerHTML = prefix;

    // MaJ Prix
    // =======================

    for (a = document.querySelectorAll('span[data-prefix] + span'), i = 0; a[i]; ++i) if (document.activeElement != a[i]) a[i].innerHTML = parsePrice(parseFloatHTML(a[i]));
}

/* Chargement */

function onContentLoad() {
    updateInvoice();

    var
    input = document.querySelector('input'),
    image = document.querySelector('img');

    function onClick(e) {
        var element = e.target.querySelector('[contenteditable]'), row;

        element && e.target != document.documentElement && e.target != document.body && element.focus();

        if (e.target.matchesSelector('.add')) {
            document.querySelector('table.inventory tbody').appendChild(generateTableRow());
        }
        else if (e.target.className == 'cut') {
            jQuery('#pet-select').val('');
            row = e.target.ancestorQuerySelector('tr');

            row.parentNode.removeChild(row);
        }

        updateInvoice();
    }

    function onEnterCancel(e) {
        e.preventDefault();

        image.classList.add('hover');
    }

    function onLeaveCancel(e) {
        e.preventDefault();

        image.classList.remove('hover');
    }

    function onFileInput(e) {
        image.classList.remove('hover');

        var
        reader = new FileReader(),
        files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
        i = 0;

        reader.onload = onFileLoad;

        while (files[i]) reader.readAsDataURL(files[i++]);
    }

    function onFileLoad(e) {
        var data = e.target.result;

        image.src = data;
    }

    if (window.addEventListener) {
        document.addEventListener('click', onClick);

        document.addEventListener('mousewheel', updateNumber);
        document.addEventListener('keydown', updateNumber);

        document.addEventListener('keydown', updateInvoice);
        document.addEventListener('keyup', updateInvoice);

        input.addEventListener('focus', onEnterCancel);
        input.addEventListener('mouseover', onEnterCancel);
        input.addEventListener('dragover', onEnterCancel);
        input.addEventListener('dragenter', onEnterCancel);

        input.addEventListener('blur', onLeaveCancel);
        input.addEventListener('dragleave', onLeaveCancel);
        input.addEventListener('mouseout', onLeaveCancel);

        input.addEventListener('drop', onFileInput);
        input.addEventListener('change', onFileInput);
    }
}

window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);
</script>










    </body>
</html>
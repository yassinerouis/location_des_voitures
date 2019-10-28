$(document).ready(function() {
  
  $('a.disabled').click(function(e){
    e.preventDefault();
  });

  // Setup CKeditor Rich Text Editor
  if( $('#ckeditor').length > 0 ) {
    CKEDITOR.replace('ckeditor');
  }
  // Second text editor (in the same view)
  if( $('#ckeditor2').length > 0 ) {
    CKEDITOR.replace('ckeditor2');
  }
  
  $('form.ajax button[type="submit"]').click(function(e){
      
    //   e.preventDefault();
      
      // Replace the textarea with ckeditor data
        if( $('textarea#ckeditor').length > 0 ) {
            var editorText = CKEDITOR.instances.ckeditor.getData();
            $('textarea#ckeditor').val( editorText );
        }
        if( $('textarea#ckeditor2').length > 0 ) {
            var editor2Text = CKEDITOR.instances.ckeditor2.getData();
            $('textarea#ckeditor2').val( editor2Text );
        }
     
       $(this).closest('form.ajax').fajax({
           
        resetOnSuccess: false,
        
        beforeSend: function(val){
            // console.log(val);
            swal({
              text: "Veuillez patienter...",
              imageUrl: "assets/admin/img/loading.gif",
              showConfirmButton: false,
              allowOutsideClick: false
            });
          },
          success: function(data){
            console.log(data);
            if(data == '1') {
              swal('Succès', "Vos modifications sont bien enregistrés.", 'success').then(function(){
                window.location.href = replace_in_url('action','index');
              });
            }
            else if(data == '0') {
              swal('Erreur', "Un erreur a été produit", 'error');
            }
            else {
              swal('Erreur', data, 'error');
            }
          },
          error: function(err){
            console.warn(err);
            swal('Erreur', "Un erreur a été produit", 'error');
          }

        });
      
  });

  // Page Profil ## Show/Hide password text
  $('#show-password').click(function(e){
    if( $(this).find('i').hasClass('icon-eye-open') )
    {
      $(this).siblings('input').first().prop('type','text');
      $(this).find('i').removeClass('icon-eye-open').addClass('icon-eye-close');
    }
    else
    {
      $(this).siblings('input').first().prop('type', 'password');
      $(this).find('i').removeClass('icon-eye-close').addClass('icon-eye-open');
    }
  });

  // Page Profil ## Generate a new strong password
  $('#generate-password').click(function(e){
    var generated = Math.random().toString(36).slice(-8);
    $(this).siblings('input').first().val(generated);
  });

  // Disable 'disabled' links
  $('li.disabled a').click(function(e){
    e.preventDefault();
  });

  // Delere items from index tables
  $('#content').on('click', '.delete-button', function(e) {
    e.preventDefault();
    var btn = $(this);
    swal({
      title: '',
      text: 'Voulez-vous vraiement supprimer cet élément ?',
      type: 'question',
      confirmButtonText: 'Oui, supprimer',
      confirmButtonColor:'#e74c3c',
      showCancelButton: true,
      cancelButtonText: 'Annuler'
    }).then(function(){

      $.ajax({
        url: btn.attr('href'),
        data: {},
        success: function(data){
          console.log(data);
          if(data == '1') {
            swal('Succès', "L'élément a été bien supprimé.", 'success').then(function(){
              window.location.href = replace_in_url('action','index');
            });
          }
          else {
            swal('Erreur', "Un erreur a été produit", 'error');
          }
        },
        error: function(err){
          console.warn(err);
          swal('Erreur', "Un erreur a été produit", 'error');
        }
      });


    });
  });

  // Make inputs disabled on readonly actions (show.php)
  if( $('form.disabled').length > 0 ) {
    $('form').find('input,select,textarea').attr('disabled',true);
    $('form').find('select').select2('disable');
    $('form').find('.ui-sortable').sortable('disable'); 
    $('form').find('.ui-sortable').on('click', '.icon-remove', function(e){ e.preventDefault() });
    $('.form-actions').empty().append('<a href="'+ replace_in_url('action','index') +'" class="btn btn-info">Retour</a>');
    // Disable sortable-divs
    $('form #widgets-wrapper').disableSelection();
  }


  // Language selecto change
  $('.language-selector').on('change', 'select', function(e) {
    var url = replace_in_url('lang', $(this).val());
    window.location.href = url;
  });

  // Return back
  $('.return-button').click(function(e){
    window.history.back();
  });

  /*======================== Live Selector ========================*/
  $('#widget-type-selector').change(function(e){
    var selected = $(this).val();
    $('div[data-id]').hide();
    $('div[data-id="'+ selected +'"]').show();
  });

  /*=========== Add Currency To Table General Info  ===========*/
  $('#add-currency').change(function(){
    var elem = $(this).select2('data').element[0];
    var iso = $(this).val();
    var symbol = $( elem ).data('symbol');
    var name = $( elem ).data('name');
    var value = $( elem ).data('value');

    $('#currencies-table').append('<tr><td> ' + name + ' (' + symbol + ')</td ><td><input type="number" step=".01" name="currency_values[' + iso + ']" value="' + value +'" class="span11"><i class="icon-remove"></i></td></tr>');

  });


  // Delete currency
  $('#currencies-table').on('click', '.icon-remove', function(e){
    $(this).closest('tr').remove();
  });

  /*=============== Section d'accueil (Ajouter une section personalisé) ===================*/
  $('#add-new-section').change(function(e) 
  {
    var sectionTypeToAdd = $(this).val();
    var lastCollapseG = $('.collapse.accordion-body').last().attr('id');
    var lastCollapseGId = parseInt(lastCollapseG.substr(9));

    //------------ Text & Image ----------
    if(sectionTypeToAdd == 'text_image')
    {
      // var newRow = $('.sortable-elements li:last-child').clone(;
      console.log(newRow);
      // $('.sortable-elements').append(newRow);
    }
  });

  /*======================== Car Gallery Append categories ========================*/
  $('.gal-add-cat').change(function(e) {
    var selectedCategory = $(this).val();
    var selectedCategoryName = $(this).select2('data').text;
    var insertUrl = $('input[name="insert_url"]').val();
    var galleryForm = $(this).closest('form');

    $.ajax({
      type: 'POST',
      url: insertUrl,
      data: { category_id : selectedCategory },
      success: function(rslt) {
        $(rslt).insertBefore(galleryForm.find('.form-actions'));
        $('select').select2();
      }
    });
  });

  $('#cars_gallery_page').on('click', 'button.remove-category', function(e) {
    e.preventDefault();
    $(this).closest('.category-wrapper').remove();
  });


});

function replace_in_url(param, value) {

    url = window.location.href;
    //Try to replace the parameter if it's present in the url
    var count = 0;
    url = url.replace(new RegExp("([\\?&]" + param + "=)[^&]+"), function (a, match) {
        count = 1;
        return match + value;
    });

    //If The parameter is not present in the url append it
    if (!count) {
        url += (url.indexOf("?") >=0 ? "&" : "?") + param + "=" + value;
    }

    return url;
}

/*============================= Sortable Accordions Order =============================*/
$('form').submit(function(e){

  //--------- Sortable Accordions Order -------------
  var items = $(this).find('input.positions');
  // Change every item position value
  $.each(items, function(index, item){
    $(item).val(index+1);
  });

});

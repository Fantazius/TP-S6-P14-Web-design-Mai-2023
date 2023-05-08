const form = document.getElementById('form_delete');

form.addEventListener('submit', function(event) {
  if (!confirm('Voulez vous vraiment supprimer cet article?')) {
    event.preventDefault();
  }
});

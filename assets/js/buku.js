const post = (url, data) => fetch(url, { method: "POST", headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })

const data = []

const setCards = (term = '', category = '') => {
  let items = []
  let cards = ``
  const books_container = document.getElementById('books_container')

  if (term != '' || category != '') {
    if (category != '') {
      items = data.filter(e => e.category.toLowerCase() == category && e.title.toLowerCase().match(term.toLowerCase().trim()))
    } else {
      items = data.filter(e => e.title.toLowerCase().match(term.toLowerCase().trim()))
    }
  } else {
    items = data
  }

  if (items.length == 0) {
    cards = `
    <div class="col-12 col-md-6 col-lg-4 text-center">
      <img src="./assets/img/questions-animate.svg"  alt="" />
      <p>Empty search results</p>
  </div>
    `
  } else {
    items.forEach(el => {
      cards += `
      <div class="col-12 col-lg-3 col-md-4 mb-3">
      <div class="card">
        <img src="./assets/img/${el.img}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${el.title}</h5>
          <p class="text-muted">${el.writer}</p>
          <div class="d-grid grid-gap-2">
            <a href="#" class="btn btn-primary" onclick="setModal(${el.id_book})" data-bs-toggle="modal" data-bs-target="#preview">Show Preview</a>
          </div>
        </div>
      </div>
    </div>
      `
    });
  }

  books_container.innerHTML = cards
}

fetch('api.php?q=books').then(e => e.json()).then(e => { data.push(...e); setCards() }).catch(e => { console.error(e) })

const setModal = (id) => {
  const item = data.filter(e => e.id_book == id)[0]
  document.querySelector('#id_book').value = id
  document.querySelector('#img_preview').src = './assets/img/' + item.img
  document.querySelector('.modal .modal-body .details').innerHTML = `
  <p><b>Title :</b> ${item.title}</p>
  <p><b>Written by :</b> ${item.writer}</p>
  <p><b>Category :</b> ${item.category}</p>
  <p class="text-justify">${item.preview}</p>
  `

  fetch('api.php?q=comments&id_book=' + id).then(e => e.json()).then(e => { setComments(e) }).catch(e => { console.error(e) })
}

const setComments = (data) => {
  let list_items = ``
  const list_group = document.querySelector('.comments .list-group')
  const username = document.getElementById('username').value

  if (data.length == 0) {
    list_items = `
    <p>
      no comments yet
    </p>
    `
  } else {
    data.forEach(el => {
      list_items += `
        <div class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">${el.username}</h5>
            <!-- <small>3 days ago</small> -->
          </div>
          <p class="mb-5 text-muted">${el.body}</p>
          ${username != el.username || username == 'Anonymous' ? '' :
          `
          <small>
          <span onclick="editComment(${el.id_comment},${el.id_book},'${el.body}')" class="badge text-bg-warning text-decoration-none hoverable">Edit</span>
          <span onclick="deleteComment(${el.id_comment},${el.id_book})" class="badge text-bg-danger text-decoration-none hoverable">Delete</span>
          </small>
          `}
          </div>
          `
    })
  }

  list_group.innerHTML = list_items
}

const deleteComment = (id_comment, id_book) => {

  Swal.fire('Delete the comment?', 'it will be gone forever', 'question').then((result) => {
    if (result.isConfirmed) {
      fetch('api.php?q=delete_comment&id_comment=' + id_comment + '&id_book=' + id_book).then(e => e.json()).then(e => { setComments(e) }).catch(e => { console.error(e) })
    }
  })

}

const editComment = async (id_comment, id_book, body) => {

  const { value: text } = await Swal.fire({
    input: 'textarea',
    inputValue: body,
    inputLabel: 'Edit your comment',
    showCancelButton: true
  })

  if (text) {
    post('api.php?q=edit_comment', { id_comment, id_book, body: text }).then(e => e.json()).then(e => { setComments(e) }).catch(e => { console.error(e) })
  }

}

const term = document.getElementById('term')
const category = document.getElementById('category')
const form_comment = document.getElementById('form_comment')

term.addEventListener('keyup', (e) => {
  setCards(e.target.value, category.value)
})

category.addEventListener('change', (e) => {
  setCards(term.value, e.target.value)
})

form_comment.addEventListener('submit', (e) => {
  e.preventDefault()
  const object = {};
  new FormData(form_comment).forEach(function (value, key) { object[key] = value });
  post('api.php?q=add_comment', object).then(e => e.json()).then(e => { setComments(e); form_comment.reset() })
})
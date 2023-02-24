




const btnAllDetail = document.querySelectorAll('.detail')

btnAllDetail.forEach((btn)=> {

    btn.addEventListener('click', ()=> {

         document.location.href="./detail.php?id=" + btn.dataset.id  ; 

    })

})

const btnAllEdit = document.querySelectorAll('.edit')

btnAllEdit.forEach((btn)=> {

    btn.addEventListener('click', ()=> {

         document.location.href="./edit.php?id=" + btn.dataset.id + "/" ; 

    })

})


const btnAllDelete = document.querySelectorAll('.delete')

btnAllDelete.forEach((btn, index)=> {

    btn.addEventListener('click', ()=> {
        console.log(btn.dataset.id, btn.dataset.produit)

        let response = confirm("Supprimer l'article " + btn.dataset.produit +  " ?")

        if(response) {

             document.location.href="./delete.php?id=" + btn.dataset.id + "/" ; 

        }

    })

})

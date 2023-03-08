import axios from 'axios'
const doAsync = (store, { url, mutationTypes }) => {
  store.commit(mutationTypes.PENDING)
  axios(url)
    .then(response => {
      store.commit(mutationTypes.SUCCESS, response.data)
    })
    .catch(error => {
      store.commit(mutationTypes.FAILURE)
    })
}
export default doAsync
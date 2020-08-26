var firebaseConfig = {
    apiKey: "AIzaSyANkIu_Q1UJXDlSvEtBhZlvsUd5Cwb5zZ4",
    authDomain: "verificarpagamento.firebaseapp.com",
    databaseURL: "https://verificarpagamento.firebaseio.com",
    projectId: "verificarpagamento",
    storageBucket: "verificarpagamento.appspot.com",
    messagingSenderId: "62695762579",
    appId: "1:62695762579:web:4c2a21e48751f6ae5f7b66",
    measurementId: "G-9PN8ZBETBQ"
  };
  firebase.initializeApp(firebaseConfig);

  function create(data, table) {
  return firebase.database().ref().child(table).push(data, () => {
      console.info('Foi pro banco')
  })
}
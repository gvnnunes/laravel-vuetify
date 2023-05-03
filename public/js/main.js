// Evita que o token Csrf expire caso o usuário mantenha a aba aberta por muito tempo
setInterval(revalidarToken, 1000 * 60 * 15); // 15 minutos

function revalidarToken() {
    axios.post("/revalidar-token");
}

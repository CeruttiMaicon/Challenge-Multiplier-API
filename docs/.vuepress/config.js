module.exports = {
    //theme: "yuu",
    title: "Desafio Multiplier",
    description: "Documentação do Desafio",
    themeConfig: {
        // yuu: {
        //   disableDarkTheme: false,
        // },
        smoothScroll: true,
        logo: "/images/logo.png",
        nav: [{
                text: "Requisitos",
                link: "/requisitos/",
            },
            {
                text: "API",
                link: "/api/",
            },
        ],
        sidebar: {
            "/requisitos/": ["", "usuarios", "categorias", "produtos", "pedidos"],
            "/api/": ["", "usuarios", "categorias", "produtos", "pedidos"],
        },
    },
};

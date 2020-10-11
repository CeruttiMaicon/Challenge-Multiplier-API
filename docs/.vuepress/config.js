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
            {
                text: "Change Logs",
                link: "/change-log/",
            },
        ],
        sidebar: {
            "/requisitos/": ["", "usuarios", "categorias", "produtos", "pedidos", "logs"],
            "/api/": ["", "usuarios", "categorias", "produtos", "pedidos", "logs"],
            "/change-log/": ["", "back-end", "front-end"],
        },
    },
};

export function error() {
    this.$router.push(`/error`);
}

export function notFoundPage() {
    this.$router.push(`/404`);
}

export function getImgUrl(anime): string {
    return anime.poster && anime.poster.main2xUrl ? anime.poster.main2xUrl : '/img/other/error.png';
}

export function scrollTo(className): void {
    const element = document.querySelector(`.${className}`);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

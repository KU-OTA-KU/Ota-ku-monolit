export function cleanDescription(description) {
    if (!description) return 'Описание не доступно';
    let cleanedDescription = description.replace(/\[.*?\]/g, '');
    return cleanedDescription;
}

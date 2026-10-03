export default function registerLayout(app) {
    const layouts = import.meta.glob('@/components/layouts/*.vue',{ eager: true })
    Object.entries(layouts).forEach(([, layout]) => {
        app.component(layout?.default?.name, layout?.default);
    });
}

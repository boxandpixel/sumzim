(function () {
    var addFilter   = wp.hooks.addFilter;
    var createBlock = wp.blocks.createBlock;

    function addSectionBlockTransforms(settings, name) {
        if (name === 'acf/section-header') {
            settings.transforms = Object.assign({}, settings.transforms, {
                to: ((settings.transforms && settings.transforms.to) || []).concat([
                    {
                        type: 'block',
                        blocks: ['acf/section-content'],
                        transform: function (attributes) {
                            return createBlock('acf/section-content', attributes);
                        }
                    }
                ])
            });
        }

        if (name === 'acf/section-content') {
            settings.transforms = Object.assign({}, settings.transforms, {
                to: ((settings.transforms && settings.transforms.to) || []).concat([
                    {
                        type: 'block',
                        blocks: ['acf/section-header'],
                        transform: function (attributes) {
                            return createBlock('acf/section-header', attributes);
                        }
                    }
                ])
            });
        }

        return settings;
    }

    addFilter(
        'blocks.registerBlockType',
        'sumzim/section-block-transforms',
        addSectionBlockTransforms
    );
})();

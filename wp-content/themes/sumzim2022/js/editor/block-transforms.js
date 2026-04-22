(function () {
    var addFilter   = wp.hooks.addFilter;
    var createBlock = wp.blocks.createBlock;

    var headerGroup = {
        name:   'section_header',
        key:    'field_69d7f040b15a4',
        fields: {
            heading:          'field_69d7f051b15a5',
            heading_position: 'field_69d7f05ab15a6',
            description:      'field_69d7f072b15a7',
        }
    };

    var contentGroup = {
        name:   'section_content',
        key:    'field_69e8e55b52f3b',
        fields: {
            heading:          'field_69e8e55b53ecb',
            heading_position: 'field_69e8e55b53f12',
            description:      'field_69e8e55b53f59',
        }
    };

    // Flat format: saved data uses prefixed field names (section_content_heading, etc.)
    function extractFromFlat(data, group) {
        var result = {};
        Object.keys(group.fields).forEach(function (fieldName) {
            result[fieldName] = data[group.name + '_' + fieldName] || '';
        });
        return result;
    }

    // Nested format: unsaved editor data uses group key → { sub-field key: value }
    function extractFromNested(data, group) {
        var nested = (data[group.key] && typeof data[group.key] === 'object') ? data[group.key] : {};
        var result = {};
        Object.keys(group.fields).forEach(function (fieldName) {
            result[fieldName] = nested[group.fields[fieldName]] || '';
        });
        return result;
    }

    function extractValues(data, group) {
        // Flat format: group name key is present as a string (even if empty)
        if (typeof data[group.name] === 'string') {
            return extractFromFlat(data, group);
        }
        return extractFromNested(data, group);
    }

    // ACF's AJAX renderer requires flat WordPress meta format to populate get_field()
    function buildFlatData(group, values) {
        var data = {};
        data[group.name]          = '';
        data['_' + group.name]    = group.key;
        Object.keys(group.fields).forEach(function (fieldName) {
            data[group.name + '_' + fieldName]        = values[fieldName] || '';
            data['_' + group.name + '_' + fieldName]  = group.fields[fieldName];
        });
        return data;
    }

    function addSectionBlockTransforms(settings, name) {
        if (name === 'acf/section-header') {
            settings.transforms = Object.assign({}, settings.transforms, {
                to: ((settings.transforms && settings.transforms.to) || []).concat([
                    {
                        type: 'block',
                        blocks: ['acf/section-content'],
                        transform: function (attributes) {
                            var values   = extractValues(attributes.data || {}, headerGroup);
                            var newAttrs = Object.assign({}, attributes, { data: buildFlatData(contentGroup, values) });
                            delete newAttrs.id;
                            delete newAttrs.name;
                            return createBlock('acf/section-content', newAttrs);
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
                            var values   = extractValues(attributes.data || {}, contentGroup);
                            var newAttrs = Object.assign({}, attributes, { data: buildFlatData(headerGroup, values) });
                            delete newAttrs.id;
                            delete newAttrs.name;
                            return createBlock('acf/section-header', newAttrs);
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

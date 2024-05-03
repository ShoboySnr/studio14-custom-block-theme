/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { InspectorControls, useBlockProps, __experimentalLinkControl as LinkControl } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import {
    PanelRow,
    TextControl,
    SelectControl,
    PanelBody
} from '@wordpress/components';
import { useState } from '@wordpress/element';
import Devices from './devices';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
    const { buttonURL, buttonText, buttonTarget } = attributes;

    const blockProps = useBlockProps();

    const target_options = [
        {
            label: 'Same',
            value: '_self',
        },
        {
            label: 'New Tab',
            value: '_blank',
        },
        {
            label: 'New Window',
            value: '_top',
        }
    ];

    return (
        <>
            <InspectorControls>
                <PanelBody
                    title={__('Button Settings', 'studio14')}
                    initialOpen={true}
                >
                    <PanelRow>
                        <fieldset>
                            <TextControl
                                label={__('Enter the Button Text', 'studio14')}
                                value={'Sample Button'}
                                onChange={ (value ) => setAttributes({ buttonText: value })}
                                type="text"
                            />
                        </fieldset>
                    </PanelRow>
                    <PanelRow>
                        <fieldset>
                            <TextControl
                                label={__('Enter the Button URL', 'studio14')}
                                value={'#'}
                                onChange={ (value ) => setAttributes({ buttonURL: value })}
                                type="url"
                            />
                        </fieldset>
                    </PanelRow>
                    <PanelRow>
                        <fieldset>
                            <SelectControl
                                label={__('Open in a New Tab', 'tec-library')}
                                options={target_options}
                                value={buttonTarget}
                                onChange={(value) => {
                                    setAttributes({ buttonTarget: value });
                                }}
                            />
                        </fieldset>
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <div {...blockProps}>
                <ServerSideRender
                    block="studio14-blocks/button-block"
                    attributes={attributes}
                />
            </div>

        </>
    );
}

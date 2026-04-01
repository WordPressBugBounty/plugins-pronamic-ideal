/**
 * External dependencies
 */
import clsx from 'clsx';

/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import {
	SelectControl,
	PanelBody,
	TextControl,
	CheckboxControl,
} from '@wordpress/components';
import {
	useBlockProps,
	__experimentalGetBorderClassesAndStyles as getBorderClassesAndStyles,
	__experimentalGetColorClassesAndStyles as getColorClassesAndStyles,
	__experimentalUseColorProps as useColorProps,
	__experimentalUseBorderProps as useBorderProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';

import {
	PLACEHOLDER_SUPPORTED_INPUT_TYPES,
	getControlComponent,
} from './utils.js';

import './style.scss';

registerBlockType( metadata.name, {
	edit: ( { attributes, setAttributes } ) => {
		const { name, value, reference, required, placeholder } = attributes;

		const controlAttributes = {
			autoComplete: 'off',
			placeholder: attributes.placeholder,
			type: attributes.type,
			onChange: ( e ) => {
				setAttributes( { value: e.target.value } );
			},
		};

		const blockProps = useBlockProps();

		const colorProps = useColorProps( attributes );
		const borderProps = useBorderProps( attributes );

		const classes = clsx(
			'wp-block-pronamic-form-control__element',
			colorProps.className,
			borderProps.className
		);

		controlAttributes.className = classes;
		controlAttributes.style = { ...colorProps.style, ...borderProps.style };
		controlAttributes.defaultValue = attributes.value;

		const TagName = 'textarea' === attributes.type ? 'textarea' : 'input';

		const typesNotToPrefix = [ 'textarea', 'radio', 'checkbox' ];

		if ( ! typesNotToPrefix.includes( attributes.type ) ) {
			/**
			 * Prefix HTML input type attribute with 'pronamic-' to avoid leaking styling
			 * from `/wp-admin/css/forms.css` in our control input element.
			 *
			 * Changing the type attribute to a non-standard value is not allowed, but for
			 * now it was an easy solution for this problen.
			 *
			 * @see https://github.com/pronamic/pronamic-pay-payments-experimental/issues/60
			 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#input_types
			 */
			controlAttributes.type = 'pronamic-' + attributes.type;
		}

		return (
			<div { ...blockProps }>
				<InspectorControls>
					<PanelBody title={ __( 'Settings', 'pronamic-ideal' ) }>
						<SelectControl
							label={ __( 'Type', 'pronamic-ideal' ) }
							value={ attributes.type }
							options={ [
								{
									label: __( 'Text', 'pronamic-ideal' ),
									value: 'text',
								},
								{
									label: __( 'Textarea', 'pronamic-ideal' ),
									value: 'textarea',
								},
								{
									label: __( 'Password', 'pronamic-ideal' ),
									value: 'password',
								},
								{
									label: __( 'URL', 'pronamic-ideal' ),
									value: 'url',
								},
								{
									label: __(
										'Email address',
										'pronamic-ideal'
									),
									value: 'email',
								},
								{
									label: __(
										'Telephone number',
										'pronamic-ideal'
									),
									value: 'tel',
								},
								{
									label: __( 'Checkbox', 'pronamic-ideal' ),
									value: 'checkbox',
								},
								{
									label: __( 'Radio', 'pronamic-ideal' ),
									value: 'radio',
								},
							] }
							onChange={ ( newVal ) => {
								setAttributes( {
									type: newVal,
								} );
							} }
						/>

						<CheckboxControl
							__nextHasNoMarginBottom
							label={ __( 'Required', 'pronamic-ideal' ) }
							help={ __(
								'Select this option to make the input required.',
								'pronamic-ideal'
							) }
							checked={ required }
							onChange={ ( newVal ) => {
								setAttributes( {
									required: newVal,
								} );
							} }
						/>

						{ PLACEHOLDER_SUPPORTED_INPUT_TYPES.includes(
							attributes.type
						) && (
							<TextControl
								__nextHasNoMarginBottom
								__next40pxDefaultSize
								label={ __( 'Placeholder', 'pronamic-ideal' ) }
								help={ __(
									'Text that appears in the form element when no value has been entered.',
									'pronamic-ideal'
								) }
								value={ placeholder }
								onChange={ ( newVal ) => {
									setAttributes( {
										placeholder: newVal,
									} );
								} }
							/>
						) }
					</PanelBody>
				</InspectorControls>

				<InspectorControls group="advanced">
					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						autoComplete="off"
						label={ __( 'Name', 'pronamic-ideal' ) }
						value={ name }
						onChange={ ( value ) => {
							setAttributes( {
								name: value,
							} );
						} }
					/>

					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						autoComplete="off"
						label={ __( 'Value', 'pronamic-ideal' ) }
						value={ value }
						onChange={ ( value ) => {
							setAttributes( {
								value,
							} );
						} }
					/>

					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						autoComplete="off"
						label={ __( 'Reference', 'pronamic-ideal' ) }
						value={ reference }
						onChange={ ( value ) => {
							setAttributes( {
								reference: value,
							} );
						} }
					/>
				</InspectorControls>

				<TagName { ...controlAttributes } />
			</div>
		);
	},

	/**
	 * Save.
	 *
	 * @param root0
	 * @param root0.attributes
	 * @Link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
	 * @link https://github.com/WordPress/gutenberg/blob/ac016984ed9d148f4a35ceb9a82ba9065131e2fa/packages/block-library/src/paragraph/save.js
	 */
	save: ( { attributes } ) => {
		const colorProps = getColorClassesAndStyles( attributes );
		const borderProps = getBorderClassesAndStyles( attributes );

		const controlComponent = getControlComponent( attributes, {
			className: clsx( colorProps.className, borderProps.className ),
			style: {
				...colorProps.style,
				...borderProps.style,
			},
		} );

		const blockProps = useBlockProps.save();

		return <div { ...blockProps }>{ controlComponent }</div>;
	},
} );

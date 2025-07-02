import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Button, ColorPicker, ColorPalette, GradientPicker, TabPanel } from '@wordpress/components';

class ResponsiveColorPickerControl extends Component {

	constructor( props ) {

		super( ...arguments );
		this.onChangeComplete = this.onChangeComplete.bind( this );
		this.onPaletteChangeComplete = this.onPaletteChangeComplete.bind( this );
		this.open = this.open.bind( this );
		this.onColorClearClick = this.onColorClearClick.bind( this );

		this.state = {
			isVisible: false,
			refresh: false,
			color: this.props.color,
			modalCanClose: true,
			backgroundType: this.props.backgroundType,
			inputattr: this.props.inputattr,
			opacityZero: this.extractOpacity(this.props.color) === 0,
			gradient: this.props.gradient,
			isGradientEnabled: this.props.isGradientEnabled || false,
		};
	}

	onResetRefresh() {
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
	}

	extractOpacity(colorStr) {
		if (!colorStr) return 1;

		if (colorStr === 'transparent') {
			return 0;
		}

		// Match rgba(r, g, b, a)
		const rgbaMatch = colorStr.match(/rgba\(\s*\d+,\s*\d+,\s*\d+,\s*(\d*\.?\d+)\s*\)/);
		if (rgbaMatch) {
			return parseFloat(rgbaMatch[1]);
		}

		return 1;
	}

	render() {

		const {
			refresh,
			modalCanClose,
			isVisible,
			gradient,
		} = this.state

		const toggleVisible = () => {
			if ( refresh === true ) {
				this.setState( { refresh: false } );
			} else {
				this.setState( { refresh: true } );
			}
			this.setState( { isVisible: true } );

			const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
			document.getElementById(currentElementID).style.paddingBottom ='480px';
		};
		
		const toggleClose = () => {
			if ( modalCanClose ) {
				if ( isVisible === true ) {
					this.setState( { isVisible: false } );
				}
				const currentElementID = this.state.inputattr.content.match(/id="([^"]*)"/)[1];
				document.getElementById(currentElementID).style.paddingBottom ='0';
			}
		};
		let finalpaletteColors = [];
		let count = 0;
		let defaultpalette = this.state.inputattr.colorPalettes;
		const defaultColorPalette = [...defaultpalette];

		defaultColorPalette.forEach( singleColor => {
			let paletteColors = {};
			Object.assign( paletteColors, { name: count + '_' + singleColor } );
			Object.assign( paletteColors, { color: singleColor } );
			finalpaletteColors.push(paletteColors);
			count ++;
		});
		let defaultValue = this.state.inputattr.default;
		let htmlLink = null;
		const {
		    inputattr
		} = this.state;
		htmlLink = inputattr.link;
		if (undefined !== htmlLink) {
	        let splited_values = htmlLink.split("=");
	        if (undefined !== splited_values[1]) {
	            htmlLink = splited_values[1].replace(/"/g, "");
	        }
	    }
		return (
			<>
				
				<div className="wp-picker-container">
					<Button className={isVisible ? 'button wp-color-result wp-picker-open' : 'button wp-color-result '}
						onClick={() => { isVisible ? toggleClose() : toggleVisible() }}
						aria-expanded='false'
						style={{
							background: (this.props.color?.startsWith('linear-gradient') || this.props.color?.startsWith('gradial-gradient') ) ? this.props.color : undefined,
							backgroundColor: !this.props.color?.startsWith('linear-gradient') ? this.props.color : undefined
						}}
					>
					</Button>
					<div className="wp-picker-holder">
						{(isVisible && this.state.isGradientEnabled) ?
							(
								<>
									<TabPanel
										className="responsive-color-picker-tabs"
										activeClass="is-active"
										tabs={[
											{
												name: 'color',
												title: __('Color', 'responsive'),
												className: 'color-tab',
											},
											{
												name: 'gradient',
												title: __('Gradient', 'responsive'),
												className: 'gradient-tab',
											},
										]}
									>
										{(tab) => (
											<div className="responsive-color-picker-tab-content">
												{tab.name === 'color' && (
													<ColorPicker
														color={this.props.color}
														onChangeComplete={(color) => this.onChangeComplete(color)}
													/>
												)}
												{tab.name === 'gradient' && (
													<GradientPicker
														value={this.state.gradient}
														onChange={(currentGradient) => {
															this.setState({ gradient: currentGradient });
															this.onChangeComplete(currentGradient, 'gradient'); // <-- important
														}}
													/>
												)}
											</div>
										)}
									</TabPanel>

									{this.state.opacityZero && (
										<div className="responsive-color-picker-zero-opac">
											<strong>{__('Note: ', 'responsive')}</strong>
											{__('Opacity is set to zero. Increase it to make the color visible.', 'responsive')}
										</div>
									)}

									<Button
										type="button"
										onClick={() => this.onColorClearClick(defaultValue)}
										className="responsive-clear-btn-inside-picker components-button is-secondary is-small"
									>
										{__('Default', 'responsive')}
									</Button>
								</>
							) : (isVisible && !this.state.isGradientEnabled) ? (
								<>
									<ColorPicker
										color={this.props.color}
										onChangeComplete={(color) => this.onChangeComplete(color)}
									/>

									{this.state.opacityZero && (
										<div className="responsive-color-picker-zero-opac">
											<strong>{__('Note: ', 'responsive')}</strong>
											{__('Opacity is set to zero. Increase it to make the color visible.', 'responsive')}
										</div>
									)}

									<Button
										type="button"
										onClick={() => this.onColorClearClick(defaultValue)}
										className="responsive-clear-btn-inside-picker components-button is-secondary is-small"
									>
										{__('Default', 'responsive')}
									</Button>
								</>
							) : (
								<></>
							)
						}
					</div>
				</div>
			</>
		);
	}

	onColorClearClick(color) {

		if( color === 'transparent' ) {
			this.setState({ opacityZero: true });
		}
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
		this.props.onChangeComplete( color, 'color' );
		wp.customize.previewer.refresh();
	}

	onChangeComplete( color ) {

		let newColor;

		if (typeof color === 'string') {
			newColor = color;
			this.setState({ opacityZero: false });
		} else if (color.rgb && color.rgb.a !== undefined) {
			if (color.rgb.a === 0) {
				this.setState({ opacityZero: true });
			} else {
				this.setState({ opacityZero: false });
			}

			newColor = (color.rgb.a !== 1)
				? `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`
				: color.hex;
		}

		this.setState({ backgroundType: type });
		this.props.onChangeComplete(newColor, type); // <--- important
	}

	onPaletteChangeComplete( color ) {
		this.setState( { color: color } );
		if ( this.state.refresh === true ) {
			this.setState( { refresh: false } );
		} else {
			this.setState( { refresh: true } );
		}
		this.props.onChangeComplete( color, 'color' );
	}


	open( open ) {
		this.setState( { modalCanClose: false } );
		open()
	}
}

ResponsiveColorPickerControl.propTypes = {
	color: PropTypes.string,
	usePalette: PropTypes.bool,
	palette: PropTypes.string,
	presetColors: PropTypes.object,
	onChangeComplete: PropTypes.func,
	onPaletteChangeComplete: PropTypes.func,
	onChange: PropTypes.func,
	customizer: PropTypes.object
};

export default ResponsiveColorPickerControl;

-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2013 at 01:22 PM
-- Server version: 5.5.30
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaambazc_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `bs_palettes`
--

DROP TABLE IF EXISTS `bs_palettes`;
CREATE TABLE IF NOT EXISTS `bs_palettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `black` varchar(100) NOT NULL,
  `grayDarker` varchar(100) NOT NULL,
  `grayDark` varchar(100) NOT NULL,
  `gray` varchar(100) NOT NULL,
  `grayLight` varchar(100) NOT NULL,
  `grayLighter` varchar(100) NOT NULL,
  `white` varchar(100) NOT NULL,
  `blue` varchar(100) NOT NULL,
  `blueDark` varchar(100) NOT NULL,
  `green` varchar(100) NOT NULL,
  `red` varchar(100) NOT NULL,
  `yellow` varchar(100) NOT NULL,
  `orange` varchar(100) NOT NULL,
  `pink` varchar(100) NOT NULL,
  `purple` varchar(100) NOT NULL,
  `bodyBackground` varchar(100) NOT NULL,
  `textColor` varchar(100) NOT NULL,
  `linkColor` varchar(100) NOT NULL,
  `linkColorHover` varchar(100) NOT NULL,
  `sansFontFamily` varchar(100) NOT NULL,
  `serifFontFamily` varchar(100) NOT NULL,
  `monoFontFamily` varchar(100) NOT NULL,
  `baseFontSize` varchar(100) NOT NULL,
  `baseFontFamily` varchar(100) NOT NULL,
  `baseLineHeight` varchar(100) NOT NULL,
  `altFontFamily` varchar(100) NOT NULL,
  `headingsFontFamily` varchar(100) NOT NULL,
  `headingsFontWeight` varchar(100) NOT NULL,
  `headingsColor` varchar(100) NOT NULL,
  `fontSizeLarge` varchar(100) NOT NULL,
  `fontSizeSmall` varchar(100) NOT NULL,
  `fontSizeMini` varchar(100) NOT NULL,
  `paddingLarge` varchar(100) NOT NULL,
  `paddingSmall` varchar(100) NOT NULL,
  `paddingMini` varchar(100) NOT NULL,
  `baseBorderRadius` varchar(100) NOT NULL,
  `borderRadiusLarge` varchar(100) NOT NULL,
  `borderRadiusSmall` varchar(100) NOT NULL,
  `tableBackground` varchar(100) NOT NULL,
  `tableBackgroundAccent` varchar(100) NOT NULL,
  `tableBackgroundHover` varchar(100) NOT NULL,
  `tableBorder` varchar(100) NOT NULL,
  `btnBackground` varchar(100) NOT NULL,
  `btnBackgroundHighlight` varchar(100) NOT NULL,
  `btnBorder` varchar(100) NOT NULL,
  `btnPrimaryBackground` varchar(100) NOT NULL,
  `btnPrimaryBackgroundHighlight` varchar(100) NOT NULL,
  `btnInfoBackground` varchar(100) NOT NULL,
  `btnInfoBackgroundHighlight` varchar(100) NOT NULL,
  `btnSuccessBackground` varchar(100) NOT NULL,
  `btnSuccessBackgroundHighlight` varchar(100) NOT NULL,
  `btnWarningBackground` varchar(100) NOT NULL,
  `btnWarningBackgroundHighlight` varchar(100) NOT NULL,
  `btnDangerBackground` varchar(100) NOT NULL,
  `btnDangerBackgroundHighlight` varchar(100) NOT NULL,
  `btnInverseBackground` varchar(100) NOT NULL,
  `btnInverseBackgroundHighlight` varchar(100) NOT NULL,
  `inputBackground` varchar(100) NOT NULL,
  `inputBorder` varchar(100) NOT NULL,
  `inputBorderRadius` varchar(100) NOT NULL,
  `inputDisabledBackground` varchar(100) NOT NULL,
  `formActionsBackground` varchar(100) NOT NULL,
  `inputHeight` varchar(100) NOT NULL,
  `dropdownBackground` varchar(100) NOT NULL,
  `dropdownBorder` varchar(100) NOT NULL,
  `dropdownDividerTop` varchar(100) NOT NULL,
  `dropdownDividerBottom` varchar(100) NOT NULL,
  `dropdownLinkColor` varchar(100) NOT NULL,
  `dropdownLinkColorHover` varchar(100) NOT NULL,
  `dropdownLinkColorActive` varchar(100) NOT NULL,
  `dropdownLinkBackgroundActive` varchar(100) NOT NULL,
  `dropdownLinkBackgroundHover` varchar(100) NOT NULL,
  `zindexDropdown` varchar(100) NOT NULL,
  `zindexPopover` varchar(100) NOT NULL,
  `zindexTooltip` varchar(100) NOT NULL,
  `zindexFixedNavbar` varchar(100) NOT NULL,
  `zindexModalBackdrop` varchar(100) NOT NULL,
  `zindexModal` varchar(100) NOT NULL,
  `iconSpritePath` varchar(100) NOT NULL,
  `iconWhiteSpritePath` varchar(100) NOT NULL,
  `placeholderText` varchar(100) NOT NULL,
  `hrBorder` varchar(100) NOT NULL,
  `horizontalComponentOffset` varchar(100) NOT NULL,
  `wellBackground` varchar(100) NOT NULL,
  `navbarCollapseWidth` varchar(100) NOT NULL,
  `navbarCollapseDesktopWidth` varchar(100) NOT NULL,
  `navbarHeight` varchar(100) NOT NULL,
  `navbarBackgroundHighlight` varchar(100) NOT NULL,
  `navbarBackground` varchar(100) NOT NULL,
  `navbarBorder` varchar(100) NOT NULL,
  `navbarText` varchar(100) NOT NULL,
  `navbarLinkColor` varchar(100) NOT NULL,
  `navbarLinkColorHover` varchar(100) NOT NULL,
  `navbarLinkColorActive` varchar(100) NOT NULL,
  `navbarLinkBackgroundHover` varchar(100) NOT NULL,
  `navbarLinkBackgroundActive` varchar(100) NOT NULL,
  `navbarBrandColor` varchar(100) NOT NULL,
  `navbarInverseBackground` varchar(100) NOT NULL,
  `navbarInverseBackgroundHighlight` varchar(100) NOT NULL,
  `navbarInverseBorder` varchar(100) NOT NULL,
  `navbarInverseText` varchar(100) NOT NULL,
  `navbarInverseLinkColor` varchar(100) NOT NULL,
  `navbarInverseLinkColorHover` varchar(100) NOT NULL,
  `navbarInverseLinkColorActive` varchar(100) NOT NULL,
  `navbarInverseLinkBackgroundHover` varchar(100) NOT NULL,
  `navbarInverseLinkBackgroundActive` varchar(100) NOT NULL,
  `navbarInverseSearchBackground` varchar(100) NOT NULL,
  `navbarInverseSearchBackgroundFocus` varchar(100) NOT NULL,
  `navbarInverseSearchBorder` varchar(100) NOT NULL,
  `navbarInverseSearchPlaceholderColor` varchar(100) NOT NULL,
  `navbarInverseBrandColor` varchar(100) NOT NULL,
  `paginationBackground` varchar(100) NOT NULL,
  `paginationBorder` varchar(100) NOT NULL,
  `paginationActiveBackground` varchar(100) NOT NULL,
  `heroUnitBackground` varchar(100) NOT NULL,
  `heroUnitHeadingColor` varchar(100) NOT NULL,
  `heroUnitLeadColor` varchar(100) NOT NULL,
  `warningText` varchar(100) NOT NULL,
  `warningBackground` varchar(100) NOT NULL,
  `warningBorder` varchar(100) NOT NULL,
  `errorText` varchar(100) NOT NULL,
  `errorBackground` varchar(100) NOT NULL,
  `errorBorder` varchar(100) NOT NULL,
  `successText` varchar(100) NOT NULL,
  `successBackground` varchar(100) NOT NULL,
  `successBorder` varchar(100) NOT NULL,
  `infoText` varchar(100) NOT NULL,
  `infoBackground` varchar(100) NOT NULL,
  `infoBorder` varchar(100) NOT NULL,
  `tooltipColor` varchar(100) NOT NULL,
  `tooltipBackground` varchar(100) NOT NULL,
  `tooltipArrowWidth` varchar(100) NOT NULL,
  `tooltipArrowColor` varchar(100) NOT NULL,
  `popoverBackground` varchar(100) NOT NULL,
  `popoverArrowWidth` varchar(100) NOT NULL,
  `popoverArrowColor` varchar(100) NOT NULL,
  `popoverTitleBackground` varchar(100) NOT NULL,
  `popoverArrowOuterWidth` varchar(100) NOT NULL,
  `popoverArrowOuterColor` varchar(100) NOT NULL,
  `gridColumns` varchar(100) NOT NULL,
  `gridColumnWidth` varchar(100) NOT NULL,
  `gridGutterWidth` varchar(100) NOT NULL,
  `gridRowWidth` varchar(100) NOT NULL,
  `gridColumnWidth1200` varchar(100) NOT NULL,
  `gridGutterWidth1200` varchar(100) NOT NULL,
  `gridRowWidth1200` varchar(100) NOT NULL,
  `gridColumnWidth768` varchar(100) NOT NULL,
  `gridGutterWidth768` varchar(100) NOT NULL,
  `gridRowWidth768` varchar(100) NOT NULL,
  `fluidGridColumnWidth` varchar(100) NOT NULL,
  `fluidGridGutterWidth` varchar(100) NOT NULL,
  `fluidGridColumnWidth1200` varchar(100) NOT NULL,
  `fluidGridGutterWidth1200` varchar(100) NOT NULL,
  `fluidGridColumnWidth768` varchar(100) NOT NULL,
  `fluidGridGutterWidth768` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bs_palettes`
--

INSERT INTO `bs_palettes` (`id`, `name`, `black`, `grayDarker`, `grayDark`, `gray`, `grayLight`, `grayLighter`, `white`, `blue`, `blueDark`, `green`, `red`, `yellow`, `orange`, `pink`, `purple`, `bodyBackground`, `textColor`, `linkColor`, `linkColorHover`, `sansFontFamily`, `serifFontFamily`, `monoFontFamily`, `baseFontSize`, `baseFontFamily`, `baseLineHeight`, `altFontFamily`, `headingsFontFamily`, `headingsFontWeight`, `headingsColor`, `fontSizeLarge`, `fontSizeSmall`, `fontSizeMini`, `paddingLarge`, `paddingSmall`, `paddingMini`, `baseBorderRadius`, `borderRadiusLarge`, `borderRadiusSmall`, `tableBackground`, `tableBackgroundAccent`, `tableBackgroundHover`, `tableBorder`, `btnBackground`, `btnBackgroundHighlight`, `btnBorder`, `btnPrimaryBackground`, `btnPrimaryBackgroundHighlight`, `btnInfoBackground`, `btnInfoBackgroundHighlight`, `btnSuccessBackground`, `btnSuccessBackgroundHighlight`, `btnWarningBackground`, `btnWarningBackgroundHighlight`, `btnDangerBackground`, `btnDangerBackgroundHighlight`, `btnInverseBackground`, `btnInverseBackgroundHighlight`, `inputBackground`, `inputBorder`, `inputBorderRadius`, `inputDisabledBackground`, `formActionsBackground`, `inputHeight`, `dropdownBackground`, `dropdownBorder`, `dropdownDividerTop`, `dropdownDividerBottom`, `dropdownLinkColor`, `dropdownLinkColorHover`, `dropdownLinkColorActive`, `dropdownLinkBackgroundActive`, `dropdownLinkBackgroundHover`, `zindexDropdown`, `zindexPopover`, `zindexTooltip`, `zindexFixedNavbar`, `zindexModalBackdrop`, `zindexModal`, `iconSpritePath`, `iconWhiteSpritePath`, `placeholderText`, `hrBorder`, `horizontalComponentOffset`, `wellBackground`, `navbarCollapseWidth`, `navbarCollapseDesktopWidth`, `navbarHeight`, `navbarBackgroundHighlight`, `navbarBackground`, `navbarBorder`, `navbarText`, `navbarLinkColor`, `navbarLinkColorHover`, `navbarLinkColorActive`, `navbarLinkBackgroundHover`, `navbarLinkBackgroundActive`, `navbarBrandColor`, `navbarInverseBackground`, `navbarInverseBackgroundHighlight`, `navbarInverseBorder`, `navbarInverseText`, `navbarInverseLinkColor`, `navbarInverseLinkColorHover`, `navbarInverseLinkColorActive`, `navbarInverseLinkBackgroundHover`, `navbarInverseLinkBackgroundActive`, `navbarInverseSearchBackground`, `navbarInverseSearchBackgroundFocus`, `navbarInverseSearchBorder`, `navbarInverseSearchPlaceholderColor`, `navbarInverseBrandColor`, `paginationBackground`, `paginationBorder`, `paginationActiveBackground`, `heroUnitBackground`, `heroUnitHeadingColor`, `heroUnitLeadColor`, `warningText`, `warningBackground`, `warningBorder`, `errorText`, `errorBackground`, `errorBorder`, `successText`, `successBackground`, `successBorder`, `infoText`, `infoBackground`, `infoBorder`, `tooltipColor`, `tooltipBackground`, `tooltipArrowWidth`, `tooltipArrowColor`, `popoverBackground`, `popoverArrowWidth`, `popoverArrowColor`, `popoverTitleBackground`, `popoverArrowOuterWidth`, `popoverArrowOuterColor`, `gridColumns`, `gridColumnWidth`, `gridGutterWidth`, `gridRowWidth`, `gridColumnWidth1200`, `gridGutterWidth1200`, `gridRowWidth1200`, `gridColumnWidth768`, `gridGutterWidth768`, `gridRowWidth768`, `fluidGridColumnWidth`, `fluidGridGutterWidth`, `fluidGridColumnWidth1200`, `fluidGridGutterWidth1200`, `fluidGridColumnWidth768`, `fluidGridGutterWidth768`) VALUES
(1, 'Bootstrap Default', '#000', '#222', '#333', '#555', '#999', '#EEE', '#FFF', '#049CDB', '#0064CD', '#46A546', '#9D261D', '#FFC40D', '#F89406', '#C3325F', '#7A43B6', '@white', '@grayDark', '#08C', 'darken(@linkColor, 15%)', '"Helvetica Neue", Helvetica, Arial, sans-serif', 'Georgia, "Times New Roman", Times, serif', 'Monaco, Menlo, Consolas, "Courier New", monospace', '14px', '@sansFontFamily', '20px', '@serifFontFamily', 'inherit', 'bold', 'inherit', '@baseFontSize * 1.25', '@baseFontSize * 0.85', '@baseFontSize * 0.75', '11px 19px;', '2px 10px;', '0 6px;', '4px', '6px', '3px', 'transparent', '#F9F9F9', '#F5F5F5', '#DDD', '@white', 'darken(@white, 10%)', '#CCC', '@linkColor', 'spin(@btnPrimaryBackground, 20%)', '#5BC0DE', '#2F96B4', '#62C462', '#51A351', 'lighten(@orange, 15%)', '@orange', '#EE5F5B', '#BD362F', '#444', '@grayDarker', '@white', '#CCC', '@baseBorderRadius', '@grayLighter', '#F5F5F5', '@baseLineHeight + 10px', '@white', 'rgba(0,0,0,.2)', '#E5E5E5', '@white', '@grayDark', '@white', '@white', '@linkColor', '@dropdownLinkBackgroundActive', '1000', '1010', '1030', '1030', '1040', '1050', '../img/glyphicons-halflings.png', '../img/glyphicons-halflings-white.png', '@grayLight', '@grayLighter', '180px', '#F5F5F5', '979px', '@navbarCollapseWidth + 1', '40px', '@white', 'darken(@navbarBackgroundHighlight, 5%)', 'darken(@navbarBackground, 12%)', '#777', '#777', '@grayDark', '@gray', 'transparent', 'darken(@navbarBackground, 5%)', '@navbarLinkColor', '#111', '#222', '#252525', '@grayLight', '@grayLight', '@white', '@navbarInverseLinkColorHover', 'transparent', '@navbarInverseBackground', 'lighten(@navbarInverseBackground, 25%)', '@white', '@navbarInverseBackground', '#CCC', '@navbarInverseLinkColor', '#FFF', '#DDD', '#F5F5F5', '@grayLighter', 'inherit', 'inherit', '#C09853', '#FCF8E3', 'darken(spin(@warningBackground, -10), 3%)', '#B94A48', '#F2DEDE', 'darken(spin(@errorBackground, -10), 3%)', '#468847', '#DFF0D8', 'darken(spin(@successBackground, -10), 5%)', '#3A87AD', '#D9EDF7', 'darken(spin(@infoBackground, -10), 7%)', '#FFF', '#000', '5px', '@tooltipBackground', '#FFF', '10px', '#FFF', 'darken(@popoverBackground, 3%)', '@popoverArrowWidth + 1', 'rgba(0,0,0,.25)', '12', '60px', '20px', '(@gridColumns * @gridColumnWidth) + (@gridGutterWidth * (@gridColumns - 1))', '70px', '30px', '(@gridColumns * @gridColumnWidth1200) + (@gridGutterWidth1200 * (@gridColumns - 1))', '42px', '20px', '(@gridColumns * @gridColumnWidth768) + (@gridGutterWidth768 * (@gridColumns - 1))', 'percentage(@gridColumnWidth/@gridRowWidth)', 'percentage(@gridGutterWidth/@gridRowWidth)', 'percentage(@gridColumnWidth1200/@gridRowWidth1200)', 'percentage(@gridGutterWidth1200/@gridRowWidth1200)', 'percentage(@gridColumnWidth768/@gridRowWidth768)', 'percentage(@gridGutterWidth768/@gridRowWidth768)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

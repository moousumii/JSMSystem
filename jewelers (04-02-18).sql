-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2018 at 03:48 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewelers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(40) COLLATE utf8_bin NOT NULL,
  `adminEmail` varchar(50) COLLATE utf8_bin NOT NULL,
  `adminContact` varchar(20) COLLATE utf8_bin NOT NULL,
  `adminAddress` text COLLATE utf8_bin NOT NULL,
  `adminUserID` varchar(30) COLLATE utf8_bin NOT NULL,
  `adminPassword` varchar(400) COLLATE utf8_bin NOT NULL,
  `adminStatus` int(2) NOT NULL DEFAULT '1' COMMENT '0=InActive, 1=Active',
  `admin_role_roleID` int(11) NOT NULL,
  `shop_info_shopID` int(11) NOT NULL,
  `adminNote` text COLLATE utf8_bin NOT NULL,
  `adminJoinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adminUpdateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`adminID`, `adminName`, `adminEmail`, `adminContact`, `adminAddress`, `adminUserID`, `adminPassword`, `adminStatus`, `admin_role_roleID`, `shop_info_shopID`, `adminNote`, `adminJoinDate`, `adminUpdateDate`) VALUES
(1, 'SatrlabIT', 'starlabTeam@gmail.com', '01719450855', 'Zindabazar,Sylhet', 'starlabIT', 'd7ea52fb792bed01df7174c48605cf19', 1, 1, 1, '', '2017-02-14 17:06:16', '0000-00-00 00:00:00'),
(6, 'Excellent Store Keeper', 'storekeeper_excellent@starlabit.email', 'Rifat', 'Excellent 631ea72176464e6d2b8adda6c47a993a\n', 'stock', 'd7ea52fb792bed01df7174c48605cf19', 1, 3, 3, '', '2017-05-03 12:05:12', '0000-00-00 00:00:00'),
(7, 'admin admin', 'admin@excellent.com', '123456', 'address', 'StarLabIT1', 'd7ea52fb792bed01df7174c48605cf19', 1, 2, 3, '', '2017-03-22 12:27:38', '0000-00-00 00:00:00'),
(8, 'Mr. Rifat', 'rifat@jonota.com', '01727414166', 'Zindabazar', 'admin', 'd7ea52fb792bed01df7174c48605cf19', 1, 2, 3, '', '2017-06-30 19:24:59', '0000-00-00 00:00:00'),
(9, 'Excellent - 1 Manager', 'excellent1@starlabit.email', '123456', 'Zindabazar', 'manager', 'b4af804009cb036a4ccdc33431ef9ac9', 1, 4, 4, '', '2018-01-07 17:26:29', '2017-04-27 19:11:08'),
(10, 'Salim Shoes Manager', 'salimshoes@gmail.com', '12345678979654', 'Zindabazar, Sylhet', 'salim', 'd7ea52fb792bed01df7174c48605cf19', 1, 4, 5, '', '2017-08-30 18:11:27', '0000-00-00 00:00:00'),
(11, 'Excellent - 2 Manager', 'excellent2@starlab.email', '0123456789', 'Zindabazar', 'excellent2', '29ce822e8b7e51a318e382b0e34f4360', 1, 4, 6, '', '2017-04-27 13:09:18', '0000-00-00 00:00:00'),
(12, 'name', 'email@gmail.com', '2453557', 'address', 'userId', '5dbab745ca7dc1a1abb2e4352bdb0549', 1, 4, 4, '', '2017-08-03 16:29:52', '0000-00-00 00:00:00'),
(13, 'name', '', '2453557', '', 'manager1', '25d55ad283aa400af464c76d713c07ad', 1, 4, 0, 'Note', '2017-09-20 20:26:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`roleID`, `roleName`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(4, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `billInfoId` int(11) NOT NULL,
  `client_info_supplierId` int(11) NOT NULL,
  `billAmount` double NOT NULL,
  `billReferenceNumber` varchar(200) COLLATE utf8_bin NOT NULL,
  `billDetails` text COLLATE utf8_bin NOT NULL,
  `billNote` text COLLATE utf8_bin NOT NULL,
  `billDate` date NOT NULL,
  `billAddedDate` datetime NOT NULL,
  `billAddedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`billInfoId`, `client_info_supplierId`, `billAmount`, `billReferenceNumber`, `billDetails`, `billNote`, `billDate`, `billAddedDate`, `billAddedBy`) VALUES
(1, 2, 5000, '12345678', 'Details', 'Note', '0000-00-00', '2017-09-24 03:28:06', 9),
(2, 8, 500, '', 'details', 'note', '0000-00-00', '2018-02-04 18:39:37', 9);

-- --------------------------------------------------------

--
-- Table structure for table `cash_account_info`
--

CREATE TABLE `cash_account_info` (
  `cashAccountInfoId` int(11) NOT NULL,
  `cashAccountName` varchar(300) COLLATE utf8_bin NOT NULL,
  `cashAccountBalance` double NOT NULL,
  `cashAccountNote` text COLLATE utf8_bin NOT NULL,
  `cashAccountStatus` int(2) NOT NULL DEFAULT '1' COMMENT '0=InActive, 1=Active',
  `cashAccountAddedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cash_account_info`
--

INSERT INTO `cash_account_info` (`cashAccountInfoId`, `cashAccountName`, `cashAccountBalance`, `cashAccountNote`, `cashAccountStatus`, `cashAccountAddedDate`) VALUES
(-1, 'Cash', 0, '', 1, '0000-00-00 00:00:00'),
(0, 'Petty Cash', 0, '', 1, '0000-00-00 00:00:00'),
(1, 'Kc Dada', 10000, 'eeeeeeeee					    ', 1, '2017-09-18 14:31:34'),
(2, 'Mahfuz Bhai', 5960000, 'bakka Teka Baaaaaa   ', 1, '2017-09-18 14:34:29'),
(3, 'Smriti Afa', 100, 'Oto Kom niiiii gooooo					    ', 1, '2017-09-18 14:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `cash_payment_info`
--

CREATE TABLE `cash_payment_info` (
  `cashPaymentInfoId` int(11) NOT NULL,
  `paymentType` int(2) NOT NULL COMMENT '1=Received Payment,2=Paid Payment',
  `paidAmount` double NOT NULL,
  `client_info_paymentClientId` int(11) NOT NULL,
  `cashChequeNo` varchar(200) COLLATE utf8_bin NOT NULL,
  `cashChequeAmount` double NOT NULL,
  `cashBankName` varchar(300) COLLATE utf8_bin NOT NULL,
  `cashPayeeName` varchar(180) COLLATE utf8_bin NOT NULL,
  `cashPaymentDate` datetime NOT NULL,
  `cashPaymentNote` text COLLATE utf8_bin NOT NULL,
  `cashPaymentEntryBy` int(11) NOT NULL,
  `cashPaymentMethod` int(2) NOT NULL COMMENT '1=cash, 2=cheque'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cash_payment_info`
--

INSERT INTO `cash_payment_info` (`cashPaymentInfoId`, `paymentType`, `paidAmount`, `client_info_paymentClientId`, `cashChequeNo`, `cashChequeAmount`, `cashBankName`, `cashPayeeName`, `cashPaymentDate`, `cashPaymentNote`, `cashPaymentEntryBy`, `cashPaymentMethod`) VALUES
(2, 1, 600, 1, '', 0, '', '', '2017-09-26 02:37:38', 'customer payment\r\n							    ', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cash_transfer_details`
--

CREATE TABLE `cash_transfer_details` (
  `cashTransferDetailsId` int(11) NOT NULL,
  `cashtransferDate` datetime NOT NULL,
  `cashTransferFrom` int(11) NOT NULL COMMENT '-1=Cash, 0=Petty Cash',
  `cashTransferTo` int(11) NOT NULL COMMENT '-1=Cash, 0=Petty Cash',
  `cashTransferAmount` double NOT NULL,
  `cashTransferNote` text COLLATE utf8_bin NOT NULL,
  `cashTransferBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cash_transfer_details`
--

INSERT INTO `cash_transfer_details` (`cashTransferDetailsId`, `cashtransferDate`, `cashTransferFrom`, `cashTransferTo`, `cashTransferAmount`, `cashTransferNote`, `cashTransferBy`) VALUES
(1, '2017-09-25 01:51:00', 2, 1, 10000, 'cash transfer account to account', 9),
(2, '2017-09-25 01:52:22', 2, -1, 20000, 'transfer to Cash', 9),
(3, '2017-09-25 01:55:08', 2, 0, 10000, 'transfer to petty cash', 9);

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `clientID` int(11) NOT NULL,
  `clientCompanyName` varchar(300) COLLATE utf8_bin NOT NULL,
  `clientContactName` varchar(100) COLLATE utf8_bin NOT NULL,
  `clientContactNumber` varchar(20) COLLATE utf8_bin NOT NULL,
  `businessStartedSince` date NOT NULL,
  `clientReference` varchar(300) COLLATE utf8_bin NOT NULL,
  `clientStatus` int(11) NOT NULL DEFAULT '1' COMMENT '0=inActive,1=Active',
  `clientType` int(2) NOT NULL DEFAULT '1' COMMENT '1=Customer, 2=Supplier',
  `clientBalance` double NOT NULL DEFAULT '0',
  `clientAddress` text COLLATE utf8_bin NOT NULL,
  `clientNote` text COLLATE utf8_bin NOT NULL,
  `clientAddedDate` datetime NOT NULL,
  `clientAddedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`clientID`, `clientCompanyName`, `clientContactName`, `clientContactNumber`, `businessStartedSince`, `clientReference`, `clientStatus`, `clientType`, `clientBalance`, `clientAddress`, `clientNote`, `clientAddedDate`, `clientAddedBy`) VALUES
(1, '', 'Mr. Customer ', '01718508746', '2017-09-08', 'testing', 0, 1, -2020, 'Address', 'no note . this field is only for kanthi ....', '2017-09-08 21:51:30', 9),
(2, '', 'Mr. Supplier', '32665787446', '2016-08-04', 'testing', 1, 2, 10000, '', 'This Field is only for kanthi', '2017-09-08 21:59:53', 9),
(3, '', 'Mr. Customer 2', '01759846269', '2016-10-04', 'testing', 1, 1, -4000, '', 'this field for kanthi only ', '2017-09-08 22:28:12', 9),
(4, '', 'Client Name', '01712-122345', '0000-00-00', 'Reference', 1, 1, 500, 'Address', 'Note', '2018-01-17 22:01:28', 9),
(6, '', 'The Client', '01712-123456', '0000-00-00', 'testing', 1, 1, 0, 'Address', 'Note', '2018-01-18 00:20:51', 9),
(7, '', 'Client', '01712121212', '0000-00-00', 'testing', 1, 1, 0, 'Address', '', '2018-01-18 00:23:39', 9),
(8, '', 'abcd', '123', '0000-00-00', 'testing', 1, 1, 600, 'address', '', '2018-01-18 00:32:48', 9),
(9, '', 'ab', '32123', '0000-00-00', 'testing', 1, 1, 30, 'address', '', '2018-01-18 00:39:41', 9),
(10, '', 'name', '321235', '0000-00-00', 'testing', 1, 1, 0, 'address', '', '2018-01-18 01:55:00', 9),
(11, '', 'client-1', '123987', '2018-01-20', '', 1, 1, 0, 'address', '', '2018-01-18 01:56:51', 9),
(12, '', 'pqr', '654', '2018-01-21', '', 1, 1, 0, 'address', '', '2018-01-18 01:58:36', 9),
(13, '', 'nksjfnke', '1234567', '2018-02-03', 'testing', 1, 1, 0, 'Address', 'Note', '2018-02-03 12:20:54', 9);

-- --------------------------------------------------------

--
-- Table structure for table `debit_note_info`
--

CREATE TABLE `debit_note_info` (
  `debitNoteInfoId` int(11) NOT NULL,
  `debitNoteDate` datetime NOT NULL,
  `client_info_debitNoteClientId` int(11) NOT NULL,
  `debitNoteDetails` text COLLATE utf8_bin NOT NULL,
  `debitNoteInfoNote` text COLLATE utf8_bin NOT NULL,
  `debitNoteAmount` int(11) NOT NULL,
  `debitNoteReferance` varchar(180) COLLATE utf8_bin NOT NULL,
  `debitNoteAddedBy` int(11) NOT NULL,
  `debitNoteAddedDate` datetime NOT NULL,
  `debitNoteStatus` int(2) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `debit_note_info`
--

INSERT INTO `debit_note_info` (`debitNoteInfoId`, `debitNoteDate`, `client_info_debitNoteClientId`, `debitNoteDetails`, `debitNoteInfoNote`, `debitNoteAmount`, `debitNoteReferance`, `debitNoteAddedBy`, `debitNoteAddedDate`, `debitNoteStatus`) VALUES
(1, '2017-09-22 00:00:00', 3, 'Details', 'Note', 1000, '', 9, '2017-09-24 03:46:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exchange_details`
--

CREATE TABLE `exchange_details` (
  `exchangeDetailsID` int(11) NOT NULL,
  `sale_info_exchangeSaleId` int(11) NOT NULL,
  `exchangeProductID` int(11) NOT NULL,
  `exchangeProductQuantity` int(11) NOT NULL,
  `exchangeProductType` int(11) NOT NULL COMMENT '0=return,1=new',
  `exchangeProductPrice` double NOT NULL,
  `exchangeProductSubtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_details`
--

INSERT INTO `exchange_details` (`exchangeDetailsID`, `sale_info_exchangeSaleId`, `exchangeProductID`, `exchangeProductQuantity`, `exchangeProductType`, `exchangeProductPrice`, `exchangeProductSubtotal`) VALUES
(1, 5, 3, 2, 0, 690, 1380),
(2, 5, 1, 2, 1, 1500, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `exchange_info`
--

CREATE TABLE `exchange_info` (
  `exchangeID` int(11) NOT NULL,
  `sale_info_saleID` int(11) NOT NULL,
  `returnTotalPrice` double NOT NULL,
  `returnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returnReceivedBy` int(11) NOT NULL,
  `shop_info_returnShopID` int(11) NOT NULL,
  `newTotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `expair_date`
--

CREATE TABLE `expair_date` (
  `expairDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `expense_field_info`
--

CREATE TABLE `expense_field_info` (
  `expenseFieldID` int(11) NOT NULL,
  `expenseFieldName` varchar(150) COLLATE utf8_bin NOT NULL,
  `expenseFieldDetails` text COLLATE utf8_bin NOT NULL,
  `expenseFieldStatus` int(2) NOT NULL DEFAULT '1' COMMENT '0=InActive,1=Active',
  `expenseFieldAddedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `expense_field_info`
--

INSERT INTO `expense_field_info` (`expenseFieldID`, `expenseFieldName`, `expenseFieldDetails`, `expenseFieldStatus`, `expenseFieldAddedDate`) VALUES
(1, 'Security Charge', 'Expense ', 1, '2017-09-24 05:12:13'),
(2, 'Field name', 'Field details', 1, '2018-01-15 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `expense_info`
--

CREATE TABLE `expense_info` (
  `expenseID` int(11) NOT NULL,
  `expense_field_info_expenseFieldID` int(11) NOT NULL,
  `expenseAmount` double NOT NULL,
  `expenseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expenseReference` text COLLATE utf8_bin NOT NULL,
  `expenseDetails` text COLLATE utf8_bin NOT NULL,
  `expenseNote` text COLLATE utf8_bin NOT NULL,
  `expenseEntryBy` int(11) NOT NULL,
  `shop_info_ExpenseShopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `expense_info`
--

INSERT INTO `expense_info` (`expenseID`, `expense_field_info_expenseFieldID`, `expenseAmount`, `expenseDate`, `expenseReference`, `expenseDetails`, `expenseNote`, `expenseEntryBy`, `shop_info_ExpenseShopID`) VALUES
(1, 1, 2500, '2017-09-24 10:18:04', 'expense reference', '', 'expense note', 9, 0),
(2, 1, 500, '2018-01-15 10:58:42', '', 'details', 'note', 9, 0),
(3, 2, 5000, '2018-01-15 11:48:16', '', 'Details', 'Note', 9, 0),
(4, 2, 2000, '2018-02-03 14:21:49', '', 'details', 'note', 9, 0),
(5, 2, 2000, '2018-02-03 14:22:23', '', 'details', 'note', 9, 0),
(6, 1, 7000, '2018-02-03 15:03:20', '', 'Details', 'Note', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `productId` int(11) NOT NULL,
  `productName` varchar(250) COLLATE utf8_bin NOT NULL,
  `productBarcode` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'first 2 digit from type id next 1000+ product id',
  `productQuantity` int(11) NOT NULL DEFAULT '1',
  `productWeight` double NOT NULL,
  `productDetails` text COLLATE utf8_bin NOT NULL,
  `productUnitName` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'g',
  `productAdditionalCost` double NOT NULL,
  `productTotalCost` double NOT NULL DEFAULT '0',
  `productNote` text COLLATE utf8_bin NOT NULL,
  `product_type_info_productTypeID` int(11) NOT NULL,
  `quality_price_info_qualityId` int(11) NOT NULL,
  `productSaleCounter` int(11) NOT NULL DEFAULT '0',
  `product_status_info_productStatusId` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=InActive,1=Active',
  `admin_info_productAdminID` int(11) NOT NULL,
  `productAddedDate` datetime NOT NULL,
  `productUpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `productUpdatedBy` int(11) NOT NULL,
  `productVat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`productId`, `productName`, `productBarcode`, `productQuantity`, `productWeight`, `productDetails`, `productUnitName`, `productAdditionalCost`, `productTotalCost`, `productNote`, `product_type_info_productTypeID`, `quality_price_info_qualityId`, `productSaleCounter`, `product_status_info_productStatusId`, `admin_info_productAdminID`, `productAddedDate`, `productUpdatedDate`, `productUpdatedBy`, `productVat`) VALUES
(1, 'new product', '011039', 13, 0, 'product description 1 ', 'kg', 0, 20000, 'note for product. 1', 1, 0, 2, 0, 0, '2017-09-09 01:42:07', '2018-02-04 11:25:29', 9, 0),
(3, 'lafarge Surma Cement', '011039', 7497, 0, 'Lafarge Cement', 'Sack', 0, 47681687, 'Lafarge Cement', 2, 0, 4, 0, 0, '2017-09-18 15:18:44', '2018-02-04 11:25:32', 9, 0),
(4, 'BSRM Rod', '011039', 998, 0, 'BSRM Rod', 'Ton', 0, 5445, 'BSRM Rod', 3, 0, 2, 1, 0, '2017-09-18 15:26:53', '2018-02-04 11:25:21', 9, 0),
(5, 'Ring', '011039', 1, 100, '', 'g', 1000, 0, 'note', 5, 0, 0, 3, 0, '2018-01-10 08:14:48', '2018-01-13 02:56:04', 0, 0),
(6, 'product', '011039', 1, 200, '', 'g', 2000, 0, 'note', 6, 0, 0, 1, 0, '2018-01-10 08:16:00', '2018-01-12 06:47:52', 0, 0),
(7, 'product name', '011039', 1, 100, '', 'g', 1000, 0, '', 5, 0, 0, 1, 0, '2018-01-10 15:34:52', '2018-01-12 06:47:52', 0, 0),
(8, 'Productss', '011039', 1, 500, '', 'g', 100, 0, 'note', 5, 0, 0, 1, 0, '2018-01-10 15:45:47', '2018-01-12 06:47:52', 0, 0),
(10, 'Productss name', '011039', 1, 100, '', 'g', 100, 0, '', 5, 2, 0, 2, 0, '2018-01-10 17:51:06', '2018-01-13 09:06:30', 0, 0),
(11, 'new', '011039', 1, 500, '', 'g', 1000, 0, 'Note', 6, 3, 0, 1, 0, '2018-01-10 17:57:25', '2018-01-12 06:47:52', 0, 0),
(12, 'abcd', '011039', 1, 100, '', 'g', 100, 0, '', 3, 0, 0, 2, 0, '2018-01-12 01:42:32', '2018-01-13 02:50:38', 0, 0),
(13, 'efgh', '011039', 1, 100, '', 'g', 1000, 0, '', 3, 0, 0, 1, 0, '2018-01-12 01:43:57', '2018-01-12 06:47:52', 0, 0),
(14, 'jhsjh', '011039', 1, 100, '', 'g', 5, 0, '', 5, 2, 0, 1, 0, '2018-01-12 12:11:15', '2018-01-12 06:47:52', 0, 0),
(18, 'jhsjhhj', '011039', 1, 100, '', 'g', 5, 0, '', 5, 2, 0, 1, 0, '2018-01-12 12:16:04', '2018-02-03 15:32:25', 0, 0),
(20, 'jhsjhhiokpo', '011039', 1, 100, '', 'g', 5, 0, '', 5, 2, 0, 1, 0, '2018-01-12 12:19:29', '2018-01-12 06:47:52', 0, 0),
(22, 'product-11', '011039', 1, 100, '', 'g', 5, 0, 'note', 3, 2, 0, 1, 0, '2018-01-12 12:23:47', '2018-01-17 19:44:38', 0, 0),
(23, '', '011039', 1, 0, '', 'g', 0, 0, '', 0, 0, 0, 1, 0, '0000-00-00 00:00:00', '2018-01-12 06:47:52', 0, 0),
(36, 'new-1', '011039', 1, 200, '', 'g', 5, 0, '', 1, 0, 0, 1, 0, '2018-01-12 12:27:37', '2018-01-12 06:47:52', 0, 0),
(39, 'new-5', '011039', 1, 200, '', 'g', 5, 0, '', 1, 0, 0, 1, 0, '2018-01-12 12:47:52', '2018-01-12 06:47:52', 0, 0),
(42, 'product-5', '', 1, 500, '', 'g', 100, 0, '', 2, 0, 0, 1, 0, '2018-01-12 13:14:34', '2018-01-12 07:14:34', 0, 0),
(43, 'new1', '', 1, 200, '', 'g', 5, 0, '', 2, 0, 0, 1, 0, '2018-01-12 13:14:55', '2018-01-12 07:14:55', 0, 0),
(45, 'product-4', '021045', 1, 500, '', 'g', 100, 0, '', 2, 0, 0, 1, 0, '2018-01-12 13:17:56', '2018-01-12 07:17:56', 0, 0),
(46, 'name-1', '111046', 1, 100, '', 'g', 5, 0, 'notes', 11, 2, 0, 1, 0, '2018-01-12 13:18:46', '2018-01-17 19:41:54', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_status_info`
--

CREATE TABLE `product_status_info` (
  `productStatusId` int(11) NOT NULL,
  `statusTitle` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_status_info`
--

INSERT INTO `product_status_info` (`productStatusId`, `statusTitle`) VALUES
(1, 'In Stock'),
(2, 'Sold'),
(3, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_info`
--

CREATE TABLE `product_type_info` (
  `productTypeID` int(11) NOT NULL,
  `productTypeName` varchar(60) COLLATE utf8_bin NOT NULL,
  `productTypeNote` text COLLATE utf8_bin NOT NULL,
  `quality_price_info_qualityId` int(11) NOT NULL,
  `productTypeStatus` int(11) NOT NULL DEFAULT '1' COMMENT '0=InActive, 1=Active',
  `productTypeAddedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_type_info`
--

INSERT INTO `product_type_info` (`productTypeID`, `productTypeName`, `productTypeNote`, `quality_price_info_qualityId`, `productTypeStatus`, `productTypeAddedDate`) VALUES
(1, 'Type-1', 'Product type details', 0, 1, '2017-09-08 22:23:03'),
(2, 'Cement', 'ghor Bananor kaaje lage', 0, 1, '2017-09-18 15:05:43'),
(3, 'Rod', 'Rod', 0, 1, '2017-09-18 15:26:28'),
(4, 'Product', 'Note', 1, 1, '2018-01-10 00:15:12'),
(5, 'new', 'note', 2, 1, '2018-01-10 06:33:38'),
(6, 'product name', 'notes', 3, 1, '2018-01-10 08:09:07'),
(7, '123', '', 2, 1, '2018-01-12 02:06:55'),
(8, 'A', 'note', 5, 2, '2018-01-12 02:07:07'),
(9, 'poi', '', 2, 1, '2018-01-12 02:07:17'),
(10, '123456', 'note', 1, 1, '2018-01-12 02:07:26'),
(11, 'group', '', 2, 1, '2018-01-12 02:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_update_info`
--

CREATE TABLE `product_update_info` (
  `productUpdateID` int(11) NOT NULL,
  `productUpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_info_updatedProductID` int(11) NOT NULL,
  `productUpdatedQuantity` int(11) NOT NULL,
  `admin_info_productUpdatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_update_info`
--

INSERT INTO `product_update_info` (`productUpdateID`, `productUpdateDate`, `product_info_updatedProductID`, `productUpdatedQuantity`, `admin_info_productUpdatedBy`) VALUES
(1, '2017-09-11 16:02:54', 1, 5, 9),
(2, '2017-09-11 19:32:05', 1, 10, 9),
(3, '2017-09-18 09:28:50', 4, 1000, 9),
(4, '2017-09-18 09:30:35', 3, 7501, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pyment_info`
--

CREATE TABLE `pyment_info` (
  `paymentInfoId` int(11) NOT NULL,
  `paymentInfoDate` datetime NOT NULL,
  `paymentInfoType` int(3) NOT NULL COMMENT '1=Cash in, 2=Cash out',
  `client_info_paymentInfoclientId` int(11) NOT NULL,
  `paymentInfoAmount` double NOT NULL,
  `paymentInfoNote` text COLLATE utf8_bin NOT NULL,
  `paymentInfoMethod` int(2) NOT NULL COMMENT '1=cash, 2=cheque',
  `paymentInfoPayeeName` varchar(80) COLLATE utf8_bin NOT NULL,
  `paymentInfoChequeNumber` varchar(100) COLLATE utf8_bin NOT NULL,
  `paymentInfoBankName` varchar(150) COLLATE utf8_bin NOT NULL,
  `paymentInfoChequeAmount` double NOT NULL,
  `paymentInfoEntryBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `quality_price_info`
--

CREATE TABLE `quality_price_info` (
  `qualityId` int(11) NOT NULL,
  `quality` varchar(50) COLLATE utf8_bin NOT NULL,
  `qualityPrice` double NOT NULL DEFAULT '0',
  `qualityStatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=InActive, 1=Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quality_price_info`
--

INSERT INTO `quality_price_info` (`qualityId`, `quality`, `qualityPrice`, `qualityStatus`) VALUES
(1, '22/22 CARAT', 500, 1),
(2, '21/21 CARAT', 1000, 1),
(3, '18/18 CARAT', 200, 1),
(4, 'TRADITIONAL METHOD', 500, 1),
(5, '21/21 CARAT SILVER (CADMIUM)', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quick_sale_details`
--

CREATE TABLE `quick_sale_details` (
  `quickSaleDetailsID` int(11) NOT NULL,
  `sale_info_quickSaleID` int(11) NOT NULL,
  `shop_info_shopID` int(11) NOT NULL,
  `product_info_quickSaleProductID` int(11) NOT NULL,
  `quickSaleProductQuantity` int(11) NOT NULL,
  `quickSaleMainPrice` double NOT NULL,
  `quickSaleSalePrice` double NOT NULL,
  `quickSaleBuyPrice` double NOT NULL,
  `quickSaleProductSubTotal` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `quick_sale_details`
--

INSERT INTO `quick_sale_details` (`quickSaleDetailsID`, `sale_info_quickSaleID`, `shop_info_shopID`, `product_info_quickSaleProductID`, `quickSaleProductQuantity`, `quickSaleMainPrice`, `quickSaleSalePrice`, `quickSaleBuyPrice`, `quickSaleProductSubTotal`) VALUES
(1, 2, 0, 4, 8, 158940, 1500, 800, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `saleDetailsID` int(11) NOT NULL,
  `sale_info_saleID` int(11) NOT NULL,
  `shop_info_shopID` int(11) NOT NULL,
  `product_info_saleProductID` int(11) NOT NULL,
  `saleProductQuantity` int(11) NOT NULL,
  `mainPrice` double NOT NULL,
  `salePrice` double NOT NULL,
  `productSubTotal` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`saleDetailsID`, `sale_info_saleID`, `shop_info_shopID`, `product_info_saleProductID`, `saleProductQuantity`, `mainPrice`, `salePrice`, `productSubTotal`) VALUES
(1, 1, 0, 3, 1, 690, 6300, 6300),
(2, 3, 0, 3, 5, 690, 1000, 5000),
(3, 3, 0, 4, 2, 158940, 1500, 3000),
(4, 5, 0, 1, 2, 1500, 1500, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_info`
--

CREATE TABLE `sale_info` (
  `saleID` int(11) NOT NULL,
  `client_info_saleClientID` int(11) NOT NULL,
  `saleTotalAmount` double NOT NULL,
  `saleTotalDiscount` double NOT NULL,
  `additionalCost` double NOT NULL DEFAULT '0',
  `transportCost` double NOT NULL DEFAULT '0',
  `saleTotalVat` double NOT NULL DEFAULT '0',
  `saleDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `saleType` int(2) NOT NULL DEFAULT '1' COMMENT '1=sale,8=Quick Sale, 3=Exchange',
  `paymentType` int(2) NOT NULL DEFAULT '1' COMMENT '1=cash,2=half-payment,3=wallet',
  `receivedTotal` double NOT NULL,
  `entryBy` int(11) NOT NULL,
  `exchangeInvoiceId` int(11) NOT NULL,
  `shop_info_saleShopID` int(11) NOT NULL,
  `salesman_info_salesmanID` int(11) NOT NULL,
  `salesmanTotalCommission` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sale_info`
--

INSERT INTO `sale_info` (`saleID`, `client_info_saleClientID`, `saleTotalAmount`, `saleTotalDiscount`, `additionalCost`, `transportCost`, `saleTotalVat`, `saleDate`, `saleType`, `paymentType`, `receivedTotal`, `entryBy`, `exchangeInvoiceId`, `shop_info_saleShopID`, `salesman_info_salesmanID`, `salesmanTotalCommission`) VALUES
(1, 3, 8000, 100, 1000, 800, 0, '2017-09-19 19:51:00', 1, 1, 7000, 9, 0, 0, 0, 0),
(2, 1, 14000, 300, 800, 1500, 0, '2017-09-22 16:05:06', 8, 1, 15000, 9, 0, 0, 0, 0),
(3, 3, 11000, 200, 1800, 1400, 0, '2017-09-22 16:11:45', 1, 1, 8000, 9, 0, 0, 0, 0),
(5, 1, 1620, 0, 0, 0, 0, '2017-09-23 21:00:05', 3, 3, 1620, 9, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_payment_info`
--

CREATE TABLE `sale_payment_info` (
  `salePaymentId` int(11) NOT NULL,
  `salePymentName` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sale_payment_info`
--

INSERT INTO `sale_payment_info` (`salePaymentId`, `salePymentName`) VALUES
(1, 'Cash'),
(2, 'Half Pyment'),
(3, 'wallet'),
(4, 'Exchange'),
(5, 'Return Amount');

-- --------------------------------------------------------

--
-- Table structure for table `shop_info`
--

CREATE TABLE `shop_info` (
  `shopID` int(11) NOT NULL,
  `shopTitle` varchar(40) COLLATE utf8_bin NOT NULL,
  `shopAddress` text COLLATE utf8_bin NOT NULL,
  `shopStatus` int(11) NOT NULL COMMENT '0=InActive,1=Active',
  `shopAddedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `transection_info`
--

CREATE TABLE `transection_info` (
  `transectionID` int(11) NOT NULL,
  `transectionTotalAmount` double NOT NULL,
  `transectionType` int(11) NOT NULL DEFAULT '1' COMMENT '1=sale,2=expense,3=exchange',
  `transectionReferenceID` int(11) NOT NULL COMMENT 'billID,expenceID,exchangeID,',
  `transectionDetails` text COLLATE utf8_bin NOT NULL,
  `client_info_transectionClientId` int(11) NOT NULL,
  `transectionBy` int(11) NOT NULL,
  `transectionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shop_info_transectionShopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transection_info`
--

INSERT INTO `transection_info` (`transectionID`, `transectionTotalAmount`, `transectionType`, `transectionReferenceID`, `transectionDetails`, `client_info_transectionClientId`, `transectionBy`, `transectionDate`, `shop_info_transectionShopID`) VALUES
(1, 7000, 1, 1, 'Sale', 3, 9, '2017-09-22 15:28:13', 0),
(2, 15000, 8, 2, 'Quick Sale', 1, 9, '2017-09-22 16:05:06', 0),
(3, 8000, 1, 3, 'Sale', 3, 9, '2017-09-22 16:11:45', 0),
(4, 1620, 3, 5, 'Quick Sale', 1, 9, '2017-09-23 21:00:05', 0),
(5, 2500, 2, 1, 'expense note', 0, 9, '2017-09-24 10:18:04', 0),
(6, 20000, 9, 2, 'transfer to Cash', 0, 9, '2017-09-24 19:52:22', 0),
(7, 10000, 6, 3, 'transfer to petty cash', 0, 9, '2017-09-24 19:55:08', 0),
(11, 2000, 4, 11, 'Test cash In Note', 0, 9, '2017-09-24 21:09:20', 0),
(13, 600, 11, 2, 'customer payment\r\n							    ', 0, 9, '2017-09-25 20:37:38', 0),
(14, 2000, 2, 5, 'details', 0, 9, '2018-02-03 14:22:23', 0),
(15, 7000, 2, 6, 'Details', 0, 9, '2018-02-03 15:03:20', 0),
(16, 500, 11, 0, 'details', 7, 9, '2018-02-03 19:05:59', 0),
(17, 500, 12, 2, 'details', 8, 9, '2018-02-04 12:39:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transection_type_info`
--

CREATE TABLE `transection_type_info` (
  `transactionTypeId` int(11) NOT NULL,
  `transectionTypeName` varchar(120) COLLATE utf8_bin NOT NULL,
  `transectionTypeLink` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transection_type_info`
--

INSERT INTO `transection_type_info` (`transactionTypeId`, `transectionTypeName`, `transectionTypeLink`) VALUES
(1, 'Sale', 'viewSaleDetails'),
(2, 'Expense', 'viewExpense'),
(3, 'Exchange', 'viewExchangeDetails'),
(4, 'Cash In', 'viewCashInOut'),
(5, 'Cash Out', 'viewCashInOut'),
(6, 'Petty Cash Transfer In', 'viewCashTransfer'),
(7, 'Petty Cash Transfer Out', 'viewCashTransfer'),
(8, 'Quick Sale', 'viewQuickSaleDetails'),
(9, 'Cash Transfer In', 'viewCashTransfer'),
(10, 'Cash Transfer Out', 'viewCashTransfer'),
(11, 'Received Payment', 'viewReceivedPaidPaymentForm'),
(12, 'Paid Payment', 'viewReceivedPaidPaymentForm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminUserID` (`adminUserID`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`billInfoId`);

--
-- Indexes for table `cash_account_info`
--
ALTER TABLE `cash_account_info`
  ADD PRIMARY KEY (`cashAccountInfoId`);

--
-- Indexes for table `cash_payment_info`
--
ALTER TABLE `cash_payment_info`
  ADD PRIMARY KEY (`cashPaymentInfoId`);

--
-- Indexes for table `cash_transfer_details`
--
ALTER TABLE `cash_transfer_details`
  ADD PRIMARY KEY (`cashTransferDetailsId`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`clientID`),
  ADD UNIQUE KEY `clientContactNumber` (`clientContactNumber`);

--
-- Indexes for table `debit_note_info`
--
ALTER TABLE `debit_note_info`
  ADD PRIMARY KEY (`debitNoteInfoId`);

--
-- Indexes for table `exchange_details`
--
ALTER TABLE `exchange_details`
  ADD PRIMARY KEY (`exchangeDetailsID`);

--
-- Indexes for table `exchange_info`
--
ALTER TABLE `exchange_info`
  ADD PRIMARY KEY (`exchangeID`);

--
-- Indexes for table `expense_field_info`
--
ALTER TABLE `expense_field_info`
  ADD PRIMARY KEY (`expenseFieldID`);

--
-- Indexes for table `expense_info`
--
ALTER TABLE `expense_info`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `productName` (`productName`);

--
-- Indexes for table `product_status_info`
--
ALTER TABLE `product_status_info`
  ADD PRIMARY KEY (`productStatusId`);

--
-- Indexes for table `product_type_info`
--
ALTER TABLE `product_type_info`
  ADD PRIMARY KEY (`productTypeID`);

--
-- Indexes for table `product_update_info`
--
ALTER TABLE `product_update_info`
  ADD PRIMARY KEY (`productUpdateID`);

--
-- Indexes for table `pyment_info`
--
ALTER TABLE `pyment_info`
  ADD PRIMARY KEY (`paymentInfoId`);

--
-- Indexes for table `quality_price_info`
--
ALTER TABLE `quality_price_info`
  ADD PRIMARY KEY (`qualityId`);

--
-- Indexes for table `quick_sale_details`
--
ALTER TABLE `quick_sale_details`
  ADD PRIMARY KEY (`quickSaleDetailsID`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`saleDetailsID`);

--
-- Indexes for table `sale_info`
--
ALTER TABLE `sale_info`
  ADD PRIMARY KEY (`saleID`),
  ADD UNIQUE KEY `saleDate` (`saleDate`);

--
-- Indexes for table `sale_payment_info`
--
ALTER TABLE `sale_payment_info`
  ADD PRIMARY KEY (`salePaymentId`);

--
-- Indexes for table `shop_info`
--
ALTER TABLE `shop_info`
  ADD PRIMARY KEY (`shopID`);

--
-- Indexes for table `transection_info`
--
ALTER TABLE `transection_info`
  ADD PRIMARY KEY (`transectionID`);

--
-- Indexes for table `transection_type_info`
--
ALTER TABLE `transection_type_info`
  ADD PRIMARY KEY (`transactionTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `billInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cash_account_info`
--
ALTER TABLE `cash_account_info`
  MODIFY `cashAccountInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cash_payment_info`
--
ALTER TABLE `cash_payment_info`
  MODIFY `cashPaymentInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cash_transfer_details`
--
ALTER TABLE `cash_transfer_details`
  MODIFY `cashTransferDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `debit_note_info`
--
ALTER TABLE `debit_note_info`
  MODIFY `debitNoteInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exchange_details`
--
ALTER TABLE `exchange_details`
  MODIFY `exchangeDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exchange_info`
--
ALTER TABLE `exchange_info`
  MODIFY `exchangeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense_field_info`
--
ALTER TABLE `expense_field_info`
  MODIFY `expenseFieldID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expense_info`
--
ALTER TABLE `expense_info`
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `product_status_info`
--
ALTER TABLE `product_status_info`
  MODIFY `productStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_type_info`
--
ALTER TABLE `product_type_info`
  MODIFY `productTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_update_info`
--
ALTER TABLE `product_update_info`
  MODIFY `productUpdateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pyment_info`
--
ALTER TABLE `pyment_info`
  MODIFY `paymentInfoId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quality_price_info`
--
ALTER TABLE `quality_price_info`
  MODIFY `qualityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quick_sale_details`
--
ALTER TABLE `quick_sale_details`
  MODIFY `quickSaleDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `saleDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale_info`
--
ALTER TABLE `sale_info`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sale_payment_info`
--
ALTER TABLE `sale_payment_info`
  MODIFY `salePaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shop_info`
--
ALTER TABLE `shop_info`
  MODIFY `shopID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transection_info`
--
ALTER TABLE `transection_info`
  MODIFY `transectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `transection_type_info`
--
ALTER TABLE `transection_type_info`
  MODIFY `transactionTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

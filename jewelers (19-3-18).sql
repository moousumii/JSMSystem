-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 06:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
(3, 15, 300, '', 'new bill', 'note for add bill', '0000-00-00', '2018-03-17 04:13:34', 10),
(4, 15, 200, '', 'no details', 'note only', '0000-00-00', '2018-03-17 04:17:02', 10),
(5, 15, 700, '', 'bill for service ', 'note for bill', '0000-00-00', '2018-03-19 22:16:26', 10);

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
-- Table structure for table `cash_book`
--

CREATE TABLE `cash_book` (
  `transectionID` int(11) NOT NULL,
  `transectionTotalAmount` double NOT NULL,
  `transectionType` int(11) NOT NULL DEFAULT '1' COMMENT '1=sale,2=expense,3=exchange',
  `transectionReferenceID` int(11) NOT NULL COMMENT 'billID,expenceID,exchangeID,',
  `transectionDetails` text COLLATE utf8_bin NOT NULL,
  `client_info_transectionClientId` int(11) NOT NULL,
  `transectionBy` int(11) NOT NULL,
  `transectionDate` datetime NOT NULL,
  `cashType` int(2) NOT NULL DEFAULT '1' COMMENT '1=cadit, 2=debit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cash_book`
--

INSERT INTO `cash_book` (`transectionID`, `transectionTotalAmount`, `transectionType`, `transectionReferenceID`, `transectionDetails`, `client_info_transectionClientId`, `transectionBy`, `transectionDate`, `cashType`) VALUES
(25, 300150, 1, 10, 'Sale', 0, 10, '2018-03-15 21:20:01', 1),
(26, 60000, 1, 11, 'Sale', 0, 10, '2018-03-16 05:23:06', 1),
(27, 500, 2, 7, 'no details', 0, 10, '2018-03-17 21:20:18', 2),
(32, 50000, 11, 32, 'no details', 14, 10, '2018-03-19 06:20:46', 1),
(33, 2000, 11, 33, 'received payment', 15, 10, '2018-03-19 21:20:49', 1),
(35, 15000, 4, 1, 'note', 0, 10, '2018-03-19 08:31:22', 2),
(36, 27000, 1, 13, 'Sale', 0, 10, '2018-03-19 22:12:38', 1),
(37, 15000, 4, 2, 'return with cash', 0, 10, '2018-03-19 22:15:14', 2),
(38, 10000, 11, 39, 'received cash from customer', 14, 10, '2018-03-19 22:17:55', 1),
(40, 470, 2, 10, 'bill', 0, 10, '2018-03-19 22:36:58', 2),
(41, 10000, 1, 14, 'Sale', 0, 10, '2018-03-19 22:39:03', 1),
(42, 2000, 6, 44, 'note for cash in', 0, 10, '2018-03-19 23:37:00', 1),
(43, 10000, 7, 45, 'cash out', 0, 10, '2018-03-19 23:39:27', 2);

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
(14, '', 'Mr. Kanthi Lal Baidya', '01554789652', '2018-03-01', '', 1, 1, 5400, 'daria  para, sylhet', 'he loves to write notes', '2018-03-17 03:58:58', 10),
(15, '', 'Mr. Mahfuz Mafi', '01675896542', '2018-03-14', 'kanthi lal baidya', 1, 1, 1000, 'Mirzajanggal, Sylhet', 'vary lazy person', '2018-03-17 04:00:26', 10);

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
  `returnID` int(11) NOT NULL,
  `returnProductID` int(11) NOT NULL,
  `returnProductQuantity` int(4) NOT NULL DEFAULT '1',
  `sale_info_saleID` int(11) NOT NULL,
  `client_info_saleClientID` int(11) NOT NULL,
  `returnTotalPrice` double NOT NULL,
  `returnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returnType` int(2) NOT NULL DEFAULT '1' COMMENT '1=cash, 2=wallet',
  `returnReceivedBy` int(11) NOT NULL,
  `returnNote` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `exchange_info`
--

INSERT INTO `exchange_info` (`returnID`, `returnProductID`, `returnProductQuantity`, `sale_info_saleID`, `client_info_saleClientID`, `returnTotalPrice`, `returnDate`, `returnType`, `returnReceivedBy`, `returnNote`) VALUES
(1, 52, 1, 0, 14, 15000, '2018-03-18 17:20:38', 1, 10, 'note'),
(2, 52, 1, 0, 15, 15000, '2018-03-19 16:15:14', 1, 10, 'return with cash');

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
(3, 'electric bill', 'no details', 1, '2018-03-17 04:07:53');

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
(7, 3, 500, '2018-03-16 22:08:40', '', 'no details', '', 10, 0),
(10, 3, 470, '2018-03-19 16:36:58', '', 'bill', 'note', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `productId` int(11) NOT NULL,
  `productName` varchar(450) COLLATE utf8_bin NOT NULL,
  `productBarcode` varchar(50) COLLATE utf8_bin NOT NULL COMMENT 'first 2 digit from type id next 1000+ product id',
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
(49, 'Neckless', '121049', 0, 500, '', 'g', 100, 0, '', 12, 1, 1, 1, 0, '2018-03-17 03:55:09', '2018-03-16 22:03:56', 0, 0),
(50, 'Neckless ', '121050', 0, 250, '', 'g', 100, 0, '', 12, 1, 1, 1, 0, '2018-03-17 03:55:36', '2018-03-18 15:40:19', 0, 0),
(51, 'Ring', '131051', 0, 67, '', 'g', 60, 0, '', 13, 1, 1, 1, 0, '2018-03-17 03:55:59', '2018-03-16 22:05:15', 0, 0),
(52, 'Ring', '131052', 1, 20, '', 'g', 100, 0, '', 13, 1, 0, 1, 0, '2018-03-17 03:56:20', '2018-03-19 16:15:14', 0, 0),
(53, 'Payel ', '141053', 0, 20, '', 'g', 40, 0, '', 14, 5, 1, 1, 0, '2018-03-17 03:56:48', '2018-03-19 16:39:03', 0, 0);

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
(12, 'Neckless', 'no notes', 1, 1, '2018-03-17 03:53:10'),
(13, 'Rings', 'notes for rings', 1, 1, '2018-03-17 03:53:30'),
(14, 'Payels', 'no notes', 5, 1, '2018-03-17 03:53:54');

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
(1, '22/22 CARAT', 1000, 1),
(2, '21/21 CARAT', 500, 1),
(3, '18/18 CARAT', 200, 1),
(4, 'TRADITIONAL METHOD', 180, 1),
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
  `saleProductWeight` double NOT NULL,
  `mainPrice` double NOT NULL,
  `salePrice` double NOT NULL,
  `productSubTotal` double NOT NULL DEFAULT '0',
  `saleDetailsDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`saleDetailsID`, `sale_info_saleID`, `shop_info_shopID`, `product_info_saleProductID`, `saleProductQuantity`, `saleProductWeight`, `mainPrice`, `salePrice`, `productSubTotal`, `saleDetailsDate`) VALUES
(10, 10, 0, 49, 1, 500, 0, 500100, 0, '2018-03-17 04:03:56'),
(11, 11, 0, 51, 1, 67, 0, 67060, 0, '2018-03-17 04:05:15'),
(12, 12, 0, 52, 1, 20, 0, 20100, 0, '2018-03-18 21:40:19'),
(13, 12, 0, 50, 1, 250, 0, 250100, 0, '2018-03-18 21:40:19'),
(14, 13, 0, 52, 1, 20, 0, 20100, 0, '2018-03-19 22:12:38'),
(15, 14, 0, 53, 1, 20, 0, 4040, 0, '2018-03-19 22:39:03');

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
  `returnTotal` double NOT NULL DEFAULT '0',
  `previousDue` double NOT NULL DEFAULT '0',
  `entryBy` int(11) NOT NULL,
  `exchangeInvoiceId` int(11) NOT NULL,
  `shop_info_saleShopID` int(11) NOT NULL,
  `salesman_info_salesmanID` int(11) NOT NULL,
  `salesmanTotalCommission` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sale_info`
--

INSERT INTO `sale_info` (`saleID`, `client_info_saleClientID`, `saleTotalAmount`, `saleTotalDiscount`, `additionalCost`, `transportCost`, `saleTotalVat`, `saleDate`, `saleType`, `paymentType`, `receivedTotal`, `returnTotal`, `previousDue`, `entryBy`, `exchangeInvoiceId`, `shop_info_saleShopID`, `salesman_info_salesmanID`, `salesmanTotalCommission`) VALUES
(10, 14, 500150, 50, 100, 0, 0, '2018-03-16 22:03:56', 1, 1, 300150, 0, 0, 0, 0, 0, 0, 0),
(11, 15, 68500, 60, 1400, 0, 0, '2018-03-16 22:05:15', 1, 1, 60000, 0, 100, 0, 0, 0, 0, 0),
(12, 14, 420400, 50, 250, 0, 0, '2018-03-18 15:40:19', 1, 1, 400000, 0, 150000, 0, 0, 0, 0, 0),
(13, 15, 27300, 50, 250, 0, 0, '2018-03-19 16:12:38', 1, 1, 27000, 0, 7000, 0, 0, 0, 0, 0),
(14, 14, 15400, 40, 1000, 0, 0, '2018-03-19 16:39:03', 1, 1, 10000, 0, 10400, 0, 0, 0, 0, 0);

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
(25, 300150, 1, 10, 'Sale', 0, 10, '2018-03-16 22:03:56', 0),
(26, 60000, 1, 11, 'Sale', 0, 10, '2018-03-16 22:05:15', 0),
(27, 500, 2, 7, 'no details', 0, 10, '2018-03-16 22:08:40', 0),
(29, 300, 12, 3, 'new bill', 15, 10, '2018-03-16 22:13:34', 0),
(30, 200, 12, 4, 'no details', 15, 10, '2018-03-16 22:17:02', 0),
(32, 50000, 11, 32, 'no details', 14, 10, '2018-03-16 23:04:58', 0),
(33, 2000, 11, 33, 'received payment', 15, 10, '2018-03-18 18:52:59', 0),
(34, 400000, 1, 12, 'Sale', 0, 10, '2018-03-18 15:40:19', 0),
(35, 15000, 4, 1, 'note', 0, 10, '2018-03-18 17:20:38', 0),
(36, 27000, 1, 13, 'Sale', 0, 10, '2018-03-19 16:12:38', 0),
(37, 15000, 4, 2, 'return with cash', 0, 10, '2018-03-19 16:15:14', 0),
(38, 700, 12, 5, 'bill for service ', 15, 10, '2018-03-19 16:16:26', 0),
(39, 10000, 11, 39, 'received cash from customer', 14, 10, '2018-03-19 16:17:55', 0),
(42, 470, 2, 10, 'bill', 0, 10, '2018-03-19 16:36:58', 0),
(43, 15400, 1, 14, 'Sale', 0, 10, '2018-03-19 16:39:03', 0),
(44, 2000, 6, 44, 'note for cash in', 0, 10, '2018-03-19 17:37:00', 0),
(45, 10000, 7, 45, 'cash out', 0, 10, '2018-03-19 17:39:27', 0);

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
(1, 'Sale', 'viewInvoice'),
(2, 'Expense', 'viewExpense'),
(3, 'Return Product (Wallet)', 'viewReturn'),
(4, 'Return With Cash', 'viewReturn'),
(5, 'Add Bill', 'viewBill'),
(6, 'Cash In', 'viewCashInOut'),
(7, 'Cash Out', 'viewCashInOut'),
(8, 'Quick Sale', 'viewQuickSaleDetails'),
(9, 'Cash Transfer In', 'viewCashTransfer'),
(10, 'Cash Transfer Out', 'viewCashTransfer'),
(11, 'Received Payment', 'viewReceivedPayment'),
(12, 'Add Bill', 'viewBill');

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
-- Indexes for table `cash_book`
--
ALTER TABLE `cash_book`
  ADD PRIMARY KEY (`transectionID`);

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
  ADD PRIMARY KEY (`returnID`);

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
  ADD UNIQUE KEY `productBarcode` (`productBarcode`);

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
  MODIFY `billInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cash_account_info`
--
ALTER TABLE `cash_account_info`
  MODIFY `cashAccountInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cash_book`
--
ALTER TABLE `cash_book`
  MODIFY `transectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
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
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `returnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expense_field_info`
--
ALTER TABLE `expense_field_info`
  MODIFY `expenseFieldID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expense_info`
--
ALTER TABLE `expense_info`
  MODIFY `expenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product_status_info`
--
ALTER TABLE `product_status_info`
  MODIFY `productStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_type_info`
--
ALTER TABLE `product_type_info`
  MODIFY `productTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `saleDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sale_info`
--
ALTER TABLE `sale_info`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `transectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `transection_type_info`
--
ALTER TABLE `transection_type_info`
  MODIFY `transactionTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

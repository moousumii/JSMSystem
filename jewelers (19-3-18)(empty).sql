-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 06:49 PM
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

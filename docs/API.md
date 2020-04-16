<!-- markdownlint-disable MD012 -->
# API documentation

- [API documentation](#api-documentation)
  - [Authentication](#authentication)
    - [logout](#logout)
    - [login](#login)
  - [User](#user)
    - [me](#me)
  - [Companies](#companies)
    - [getCompany](#getcompany)
    - [InsertCompany](#insertcompany)
  - [Customers](#customers)
    - [getCustomer](#getcustomer)
    - [createCustomer](#createcustomer)
    - [updateCustomer](#updatecustomer)
    - [deleteCustomer](#deletecustomer)
  - [Contact](#contact)
    - [deleteContact](#deletecontact)
    - [createContact](#createcontact)
    - [updateContacts](#updatecontacts)
    - [getContact](#getcontact)
  - [Quotes](#quotes)
    - [allQuotes](#allquotes)
    - [quote](#quote)
    - [updateQuote](#updatequote)
    - [createQuote](#createquote)
    - [deleteQuote](#deletequote)
  - [Invoices](#invoices)
    - [allInvoices](#allinvoices)
    - [Invoice](#invoice)
    - [createInvoice](#createinvoice)
    - [deleteInvoice](#deleteinvoice)
    - [updateInvoice](#updateinvoice)


&nbsp; <!-- break line -->


## Authentication

### logout

> Revoke the token specified in the header

**URL** : `/api/logout`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### login

> Description

**URL** : `/api/airlock/login`
**Authentication required** : `false`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| email | Required | unspecified | text |  |
| password | Required | unspecified | text |  |
| device_name | Required | unspecified | text |  |

---


&nbsp; <!-- break line -->


## User

### me

> Description

**URL** : `/api/me`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---


&nbsp; <!-- break line -->


## Companies

### getCompany

> Description

**URL** : `/api/company`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### InsertCompany

> Description

**URL** : `/api/createCompany`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| legal_form | Present | unspecified | enum('AE_FR','EI_FR','EIRL_FR','EURL_FR','SA_FR','SAS_FR','SASU_FR','SARL_FR') |  |
| default_down_payment_percentage | Present | unspecified | Integer |  |
| email | Present | unspecified | text |  |
| default_revive_delay_in_days | Present | unspecified | Integer |  |
| default_quote_notice | Present | unspecified | Integer |  |
| capital_in_cents | Present | unspecified | Integer |  |
| bban_anytmie | Present | unspecified | Integer |  |
| siret | Present | unspecified | Integer |  |
| phone | Present | unspecified | Integer |  |
| city | Present | unspecified | text |  |
| notes | Present | unspecified | text |  |
| street_number | Present | unspecified | Integer |  |
| street_name | Present | unspecified | text |  |
| default_payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| default_payment_terms | Present | unspecified | text |  |
| default_payment_delay_in_days | Present | unspecified | Integer |  |
| default_invoice_notice | Present | unspecified | Integer |  |
| bban | Present | unspecified | Integer |  |
| insurance | Present | unspecified | text |  |
| default_quote_validity_delay_in_days | Present | unspecified | Integer |  |
| zipcode | Present | unspecified | Integer |  |
| default_quote_accepting_conditions | Present | unspecified | Integer |  |
| name | Required | unspecified | text |  |

---

&nbsp; <!-- break line -->


## Customers

### getCustomer

> Description

**URL** : `/api/customers`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_company | Required | unspecified | Integer |  |

---

### createCustomer

> Description

**URL** : `/api/createCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| customer_type | Present | unspecified | enum('individual', 'professional') |  |
| status | Present | unspecified | text |  |
| meeting_date | Present | unspecified | Date |  |
| company_name | Present | unspecified | text |  |
| siret | Present | unspecified | Integer |  |
| tva_number | Present | unspecified | Integer |  |
| firstname | Present | unspecified | text |  |
| lastname | Present | unspecified | text |  |
| street_number | Present | unspecified | Integer |  |
| stret_name | Present | unspecified | text |  |
| zipcode | Present | unspecified | Integer |  |
| city | Present | unspecified | text |  |
| note | Present | unspecified | text |  |
| default_payement_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| company | Required | unspecified | Integer |  |

---

### updateCustomer

> Description

**URL** : `/api/updateCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | Required | unspecified | Integer |  |
| customer_type | Present | unspecified | text |  |
| status | Present | unspecified | text |  |
| meeting_date | Present | unspecified | Date |  |
| company_name | Present | unspecified | text |  |
| siret | Present | unspecified | Integer |  |
| tva_number | Present | unspecified | Integer |  |
| firstname | Present | unspecified | text |  |
| lastname | Present | unspecified | text |  |
| street_number | Present | unspecified | Integer |  |
| street_name | Present | unspecified | Integer |  |
| zipcode | Present | unspecified | Integer |  |
| city | Present | unspecified | text |  |
| note | Present | unspecified | text |  |
| default_payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| company | Required | unspecified | Integer |  |

---

### deleteCustomer

> Description

**URL** : `/api/deleteCustomer`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | required | unspecified | Integer |  |

---


&nbsp; <!-- break line -->


## Contact

### deleteContact

> Description

**URL** : `/api/deleteContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_contact | Required | unspecified | Integer |  |

---

### createContact

> Description

**URL** : `/api/createContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_customer | Required | unspecified | Integer |  |
| job | Present | unspecified | text |  |
| firstname | Present | unspecified | text |  |
| gender | Present | unspecified | enum('man', 'woman', 'unspecified') |  |
| lastname | Present | unspecified | text |  |
| email | Present | unspecified | text |  |
| phone_mobile | Present | unspecified | Integer |  |
| phone_fix | Present | unspecified | Integer |  |
| phone_personnal | Present | unspecified | Integer |  |
| phone_fax | Present | unspecified | Integer |  |
| notes | Present | unspecified | text |  |

---

### updateContacts

> Description

**URL** : `/api/updateContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_contact | Required | unspecified | Integer |  |
| gender | Present | unspecified | enum('man', 'woman', 'unspecified') |  |
| firstname | Present | unspecified | text |  |
| lastname | Present | unspecified | text |  |
| job | unspecified Present unspecified | text |  |
| email | Present | unspecified | text |  |
| phone_mobile | Present | unspecified | Integer |  |
| phone_fix | Present | unspecified | Integer |  |
| phone_personnal | Present | unspecified | Integer |  |
| phone_fax | Present | unspecified | Integer |  |
| notes | Present | unspecified | text |  |

---

### getContact

> Description

**URL** : `/api/contact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_customer | Required | unspecified | Integer |  |

---


&nbsp; <!-- break line -->


## Quotes

### allQuotes

> Description

**URL** : `/api/allQuote`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### quote

> Description

**URL** : `/api/quote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |

---

### updateQuote

> Description

**URL** : `/api/updateQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |
| qualification | Present | unspecified | enum('draft', 'edited', 'awaiting_approuval', 'revived', 'accepted', 'declined', 'discontinued') |  |
| edition_date | Present | unspecified | Date |  |
| validity_delay_in_days | Present | unspecified | Integer |  |
| payment_delay_in_days | Present | unspecified | Integer |  |
| payment_terms | Present | unspecified | text |  |
| payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| down_payment_percentage | Present | unspecified | Integer |  |
| notice | Present | unspecified | text |  |
| accepting_conditions | Present | unspecified | text |  |
| sending_date | Present | unspecified | Date |  |
| revived_date | Present | unspecified | Date |  |
| last_qualification_date | Present | unspecified | Date|  |

---

### createQuote

> Description

**URL** : `/api/createQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |
| qualification | Present | unspecified | enum('draft', 'edited', 'awaiting_approuval', 'revived', 'accepted', 'declined', 'discontinued') |  |
| edition_date | Present | unspecified | Date |  |
| validity_delay_in_days | Present | unspecified | Integer |  |
| payment_delay_in_days | Present | unspecified | Integer |  |
| payment_terms | Present | unspecified | text |  |
| payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| down_payment_percentage | Present | unspecified | Integer |  |
| notice | Present | unspecified | text |  |
| accepting_conditions | Present | unspecified | text |  |
| sending_date | Present | unspecified | Date |  |
| revived_date | Present | unspecified | Date |  |
| last_qualification_date | Present | unspecified | Date |  |

---

### deleteQuote

> Description

**URL** : `/api/deleteQuote`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | Required | unspecified | Integer |  |

---

&nbsp; <!-- break line -->


## Invoices

### allInvoices

> Description

**URL** : `/api/allInvoice`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

---

### Invoice

> Description

**URL** : `/api/invoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |

---

### createInvoice

> Description

**URL** : `/api/createInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |
| qualification | Present | unspecified | enum('draft', 'edited', 'awaiting_approuval', 'revived', 'accepted', 'declined', 'discontinued') |  |
| edition_date | Present | unspecified | Date |  |
| payment_date | Present | unspecified | Date |  |
| payment_delay_in_days | Present | unspecified | Integer |  |
| payment_terms | Present | unspecified | text |  |
| notice | Present | unspecified | text |  |
| payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| sending_date | Present | unspecified | Date |  |
| revived_date | Present | unspecified | Date |  |
| last_qualification_date | Present | unspecified | Date |  |
| chasing_date | Present | unspecified | Date |  |
| note | Present | unspecified | text |  |
| original_quote | Required | unspecified | Integer |  |

---

### deleteInvoice

> Description

**URL** : `/api/deleteInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | Required | unspecified | Integer |  |

---

### updateInvoice

> local

**URL** : `/api/updateInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| company_id | Required | unspecified | Integer |  |
| customer_id | Required | unspecified | Integer |  |
| qualification | Present | unspecified | enum('draft', 'edited', 'awaiting_approuval', 'revived', 'accepted', 'declined', 'discontinued') |  |
| edition_date | Present | unspecified | Date |  |
| payment_date | Present | unspecified | Date |  |
| payment_delay_in_days | Present | unspecified | Integer |  |
| payment_terms | Present | unspecified | text |  |
| notice | Present | unspecified | text |  |
| payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
| sending_date | Present | unspecified | Date |  |
| revived_date | Present | unspecified | Date |  |
| last_qualification_date | Present | unspecified | Date |  |
| chasing_date | Present | unspecified | Date |  |
| note | Present | unspecified | text |  |
| original_quote | Required | unspecified | Integer |  |

---

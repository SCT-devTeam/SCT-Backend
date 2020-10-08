<!-- markdownlint-disable MD012 -->
# API documentation

- [API documentation](#api-documentation)
  - [Authentication](#authentication)
    - [Logout](#logout)
    - [Login](#login)
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
    - [allContact](#allcontact)
    - [getContact](#getcontact)
    - [createContact](#createcontact)
    - [updateContacts](#updatecontacts)
    - [deleteContact](#deletecontact)
  - [Quotes](#quotes)
    - [allQuotes](#allquotes)
    - [quote](#quote)
    - [createQuote](#createquote)
    - [updateQuote](#updatequote)
    - [deleteQuote](#deletequote)
  - [Invoices](#invoices)
    - [allInvoices](#allinvoices)
    - [Invoice](#invoice)
    - [createInvoice](#createinvoice)
    - [updateInvoice](#updateinvoice)
    - [deleteInvoice](#deleteinvoice)


&nbsp; <!-- break line -->


## Authentication

### Logout

> Revoke the token specified in the header

**URL** : `/api/logout`
**Authentication required** : `true`
**Method** : `GET`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |

This route doesn't accept parameter

---

### Login

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

This route doesn't accept parameter

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

This route doesn't accept parameter

---

### InsertCompany

> Description

**URL** : `/api/createCompany`
**Authentication required** : `true`
**Method** : `POST`

| Key                                   | Required     | Default  | Type                                                                            | Description                                                                                                   |
| ------------------------------------- |:------------:|:--------:|:-------------------------------------------------------------------------------:| ------------------------------------------------------------------------------------------------------------- |
| legal_form                            | **required** | none     | enum['AE_FR','EI_FR','EIRL_FR','EURL_FR','SA_FR','SAS_FR','SASU_FR','SARL_FR']  | The legal form of the company. For now only FR status is supported and the program is only adapt for `AE_FR`  |
| name                                  | **required** | none     | string                                                                          | The name of the company                                                                                       |
| siret                                 | _recomended_ | null     | integer                                                                         | SIRET number of the company                                                                                   |
| email                                 | _recomended_ | null     | string                                                                          | The email contact of the company, will be used in quotes / invoices & automation by default                   |
| phone                                 | _recomended_ | null     | integer                                                                         | The phone number of the company, will be used in quotes / invoices & automation by default                    |
| street_number                         | _recomended_ | null     | integer                                                                         | The street number of the company, will be used in quotes / invoices & automation                              |
| street_name                           | _recomended_ | null     | string                                                                          | The street name of the company, will be used in quotes / invoices & automation                                |
| zipcode                               | _recomended_ | null     | integer                                                                         | The zipcode of the company, will be used in quotes / invoices & automation                                    |
| city                                  | _recomended_ | null     | string                                                                          | The city of the company, will be used in quotes / invoices & automation                                       |
| capital_in_cents                      | _recomended_ | null     | integer                                                                         | The capital (**in cents**) of the company, will be used in quotes / invoices & automation                     |
| insurance                             | _recomended_ | null     | string                                                                          | The insurance reference of the company, will be used in quotes / invoices & automation                        |
| bban                                  | _recomended_ | null     | string                                                                          | The bban of the company, will be used in quotes / invoices & automation                                       |
| bban_anytime                          | _recomended_ | null     | boolean                                                                         | A toggle to enable / disable bban display on quotes & invoices                                                |
| default_revive_delay_in_days          | _recomended_ | null     | smallInteger                                                                    | The default revive delay (**in days**) of the company, will be used for quotes / invoices & automation        |
| default_payment_delay_in_days         | _recomended_ | null     | smallInteger                                                                    | The default payment delay (**in days**) of the company, will be used for quotes / invoices & automation       |
| default_payment_terms                 | _recomended_ | null     | string                                                                          | The default payment terms of the company, will be used for quotes / invoices & automation                     |
| default_payment_method                | _recomended_ | null     | enum['credit_card','bank_transfer', 'bank_check', 'cash', 'multiple']           | The default payment method of the company, will be used for quotes / invoices & automation                    |
| default_down_payment_percentage       | _recomended_ | null     | integer                                                                         | The default down payment percentage of the company, will be used for quotes / invoices & automation           |
| default_quote_validity_delay_in_days  | _recomended_ | null     | smallInteger                                                                    | The default quote validity delay (**in days**) of the company, will be used for quotes automation             |
| default_quote_accepting_conditions    | _recomended_ | null     | string                                                                          | The default quote accepting conditions of the company, will be used for quotes automation                     |
| default_invoice_notice                | _recomended_ | null     | string                                                                          | The default invoice notice of the company, will be used for invoices                                          |
| default_quote_notice                  | _recomended_ | null     | string                                                                          | The default quote notice of the company, will be used for quotes                                              |
| notes                                 | _recomended_ | null     | string                                                                          | Notes on the company                                                                                          |

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
| street_name | Present | unspecified | text |  |
| zipcode | Present | unspecified | Integer |  |
| city | Present | unspecified | text |  |
| note | Present | unspecified | text |  |
| default_payment_method | Present | unspecified | enum('credit_card','bank_transfer', 'bank_check', 'cash', 'multiple') |  |
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

### allContact

> Description

**URL** : `/api/allContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_company | Required | unspecified | Integer |  |

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

### deleteContact

> Description

**URL** : `/api/deleteContact`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id_contact | Required | unspecified | Integer |  |

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

### deleteInvoice

> Description

**URL** : `/api/deleteInvoice`
**Authentication required** : `true`
**Method** : `POST`

| Key | Required | Default | Type | Description |
| --- | --- | --- | --- | --- |
| id | Required | unspecified | Integer |  |

---


-- Create peminjaman table

CREATE TABLE [dbo].[Peminjaman](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama] [varchar](50) NULL,
	[status] [int] NULL,
	[inventaris_id] [int] NULL,
	[kode] [char](5) NULL,
	[email] [varchar](50) NULL,
	[no_telp] [varchar](20) NULL,
	[jumlah] [int] NULL,
	[NRP] [char](14) NULL,
	[tanggal_peminjaman] [date] NULL,
	[tanggal_pengembalian] [date] NULL,
	[deskripsi] [text] NULL,
 CONSTRAINT [PK_Peminjaman] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


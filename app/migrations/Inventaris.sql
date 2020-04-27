
-- Create inventaris table

CREATE TABLE [dbo].[Inventaris](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama] [varchar](50) NULL,
	[deskripsi] [text] NULL,
	[jumlah] [int] NULL,
	[created_at] [date] NULL,
	[updated_at] [date] NULL,
 CONSTRAINT [PK_Inventaris] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO



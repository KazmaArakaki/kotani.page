FROM mcr.microsoft.com/devcontainers/base:resolute

RUN apt update && apt upgrade -y

USER vscode

WORKDIR /home/vscode

ENV LANG=C.UTF-8
ENV LC_ALL=C.UTF-8
ENV SHELL=/bin/zsh

RUN curl -fsSL https://claude.ai/install.sh | bash
